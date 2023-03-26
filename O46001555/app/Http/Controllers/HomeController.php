<?php

use App\Models\Favorite;
use App\Models\User;
use App\Models\Place;
use App\Models\Image;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function home()
    {
        // Leggo quale utente è connesso
        $user = User::find(session('user_id'));
        if ($user->username == "admin") {
            return view('admin')
                ->with('username', $user->username);
        } else {
            return view('luoghi')
                ->with('username', $user->username);
        }
    }

    public function addPlace(Request $request)
    {

        $user = User::find(session('user_id'));
        if ($user->username == "admin") {
            $checkPlace = Place::where('nome', $request->input('nome'))->first();
            $errors = array();
            if ($checkPlace !== null) {
                $errors = ['checkPlace' => 'ERRORE: Luogo già esistente...'];
                // Ritorna
                echo json_encode($errors);
            } else {
                Place::create([
                    'nome' => $request->input('nome'),
                    'primaryImg' => $request->input('primaryImg'),
                    'routeImg' => $request->input('routeImg'),
                    'routeUrl' => $request->input('routeUrl'),
                    'locality' => $request->input('locality'),
                    'difficulty' => $request->input('difficulty')
                ]);
                $currentPlace = Place::where('nome', $request->input('nome'))->first();
                if ($request->input('one_img')) {
                    Image::create([
                        'place' => $currentPlace->id,
                        'url' => $request->input('one_img')
                    ]);
                }
                if ($request->input('two_img')) {
                    Image::create([
                        'place' => $currentPlace->id,
                        'url' => $request->input('two_img')
                    ]);
                }
                if ($request->input('three_img')) {
                    Image::create([
                        'place' => $currentPlace->id,
                        'url' => $request->input('three_img')
                    ]);
                }
                if ($request->input('four_img')) {
                    Image::create([
                        'place' => $currentPlace->id,
                        'url' => $request->input('four_img')
                    ]);
                }
                if ($request->input('five_img')) {
                    Image::create([
                        'place' => $currentPlace->id,
                        'url' => $request->input('five_img')
                    ]);
                }


                $errors = ['empty' => 'empty'];
                echo json_encode($errors);
            }
        } else {
            $images = Image::all();
            $userFavorites = Favorite::where('user', $user->id)->get();
            $places = Place::all();
            return view('luoghi')
                ->with('username', $user->username);
        }
    }

    public function updateListAdmin()
    {
        // Inizializza array
        $places = array();
        // Leggi
        $res = Place::orderBy('nome', 'ASC')->get(['id', 'nome']);

        for ($i = 0; $i < count($res); ++$i) {
            $places[$i] = $res[$i];
            $favorites = Favorite::where('place', $places[$i]->id)->get();
            $countFavorites = count($favorites);
            $places[$i]['count'] = $countFavorites;
            $ratings = Rating::where('place', $places[$i]->id)->get();
            $count = count($ratings);
            if ($count == 0) {
                $places[$i]['rating'] = 0;
            } else {
                $sum = 0;
                for ($d = 0; $d < $count; ++$d) {
                    $sum = $sum + $ratings[$d]->rate;
                }
                $ratingAverage = $sum / $count;
                $places[$i]['rating'] = $ratingAverage;
            }
        }
        // Ritorna
        echo json_encode($places);
    }

    public function removePlace($nome)
    {
        $user = User::find(session('user_id'));
        if ($user->username == "admin") {
            $placeId = Place::where('nome', $nome)->first();
            Place::destroy($placeId->id);
        }
    }

    public function updatePlace()
    {
        // Inizializza array
        $places = array();
        // Leggi 
        $res = Place::orderBy('nome', 'ASC')->get(['id', 'nome', 'locality', 'primaryImg']);
        $user = User::find(session('user_id'));
        $countPlaces = 0;

        for ($i = 0; $i < count($res); ++$i) {
            $favorites = Favorite::where('place', $res[$i]->id)->where('user', $user->id)->first();
            //calcolo media valutazione
            $ratings = Rating::where('place', $res[$i]->id)->get('rate');
            $countRate = count($ratings);
            $sum = 0;
            for ($d = 0; $d < $countRate; ++$d) {
                $sum = $sum + $ratings[$d]->rate;
            }
            if ($countRate == 0) {
                $ratingAverage = "?";
            } else {
                $ratingAverage = $sum / $countRate;
            }

            $places[$countPlaces] = $res[$i];
            $places[$countPlaces]['rating'] = $ratingAverage;
            //conservo se è nei preferiti o no
            if ($favorites !== null) {
                $places[$countPlaces]['favorited'] = true;
            } else {
                $places[$countPlaces]['favorited'] = false;
            }
            $countPlaces = $countPlaces + 1;
        }
        // Ritorna
        echo json_encode($places);
    }

    public function loadDetails(Request $request)
    {
        // Inizializza array
        $details = array();
        // Leggi 
        $place = Place::where('nome', $request->nomePlace)->first();
        $user = User::find(session('user_id'));
        //carico i dati in details
        $images = Image::where('place', $place->id)->get(['url']);
        $resRatingUser = Rating::where('user', $user->id)->where('place', $place->id)->first();
        //calcolo media valutazione
        $ratings = Rating::where('place', $place->id)->get('rate');
        $countRate = count($ratings);
        $sum = 0;
        for ($d = 0; $d < $countRate; ++$d) {
            $sum = $sum + $ratings[$d]->rate;
        }
        if ($countRate == 0) {
            $ratingAverage = "?";
        } else {
            $ratingAverage = $sum / $countRate;
        }
        if ($resRatingUser != null) {
            $userRate = $resRatingUser->rate;
        } else {
            $userRate = 0;
        }

        $details = $place;
        $details['rating'] = $ratingAverage;
        $details['images'] = $images;
        $details['userRate'] = $userRate;

        // Ritorna
        echo json_encode($details);
    }

    public function updateRatings(Request $request)
    {
        $user = User::find(session('user_id'));
        // Inizializza array
        $ratings = array();
        $place = Place::where('nome', $request->nome)->first();
        $ratingUser = Rating::where('user', $user->id)->where('place', $place->id)->first();
        $ratingsCurrentPlace = Rating::where('place', $place->id)->get('rate');
        $countRate = count($ratingsCurrentPlace);
        $sum = 0;
        if ($countRate == 0) {
            $ratings['rating'] = "?";
        } else {
            for ($d = 0; $d < $countRate; ++$d) {
                $sum = $sum + $ratingsCurrentPlace[$d]->rate;
            }
            $ratingAverage = $sum / $countRate;
            $ratings['rating'] = $ratingAverage;
        }
        if ($ratingUser != null) {
            $ratings['userRate'] = $ratingUser->rate;
        } else {
            $ratings['userRate'] = 0;
        }

        // Ritorna
        echo json_encode($ratings);
    }

    public function addVote(Request $request)
    {

        $user = User::find(session('user_id'));
        if ($user->username != "admin") {
            $place = Place::where('nome', $request->nomePlace)->first();
            $checkVote = Rating::where('place', $place->id)->where('user', $user->id)->first();
            if ($checkVote !== null) {
                Rating::destroy($checkVote->id);
                if ($checkVote->rate != $request->rate) {
                    Rating::create([
                        'place' => $place->id,
                        'user' => $user->id,
                        'rate' => $request->rate
                    ]);
                }
            } else {
                Rating::create([
                    'place' => $place->id,
                    'user' => $user->id,
                    'rate' => $request->rate
                ]);
            }
        }
    }

    public function switchFavorite(Request $request)
    {

        $user = User::find(session('user_id'));
        if ($user->username != "admin") {
            $place = Place::where('nome', $request->nomePlace)->first();
            $checkFavorite = Favorite::where('place', $place->id)->where('user', $user->id)->first();
            if ($checkFavorite !== null) {
                Favorite::destroy($checkFavorite->id);
            } else {
                Favorite::create([
                    'place' => $place->id,
                    'user' => $user->id
                ]);
            }
        }
    }

}
