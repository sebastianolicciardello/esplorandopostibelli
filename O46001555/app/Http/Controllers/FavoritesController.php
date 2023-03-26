<?php
use App\Models\Image;
use App\Models\User;
use App\Models\Place;
use App\Models\Favorite;
use Illuminate\Support\Facades\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Routing\Controller as BaseController;

class FavoritesController extends BaseController
{
    public function addFavorites($id) {
        // Leggo quale utente è connesso
        $user = User::find(session('user_id'));
        if ($user->username == "admin"){
            return redirect('home');
        }
        else  {
            $checkFavorites = Favorite::where('user', $user->id)->where('place', $id)->first();
            if($checkFavorites){
                return redirect('home');
            }
            else{
                Favorite::create(['place' => $id , 'user' => $user->id]);
                return redirect('home');
            }
            
        
        }
    }

    public function removeFavorites($id) {
        // Leggo quale utente è connesso
        $user = User::find(session('user_id'));
        if ($user->username == "admin"){
            return redirect('home');
        }
        else  {
            $checkFavorites = Favorite::where('user', $user->id)->where('place', $id)->first();
            if($checkFavorites){
                Favorite::destroy($checkFavorites->id);
                return redirect('home');
            }
            else{
                return redirect('home');
            }
        }
    }

}