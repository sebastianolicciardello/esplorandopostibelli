<?php
use App\Models\Favorite;
use App\Models\User;
use App\Models\Place;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Routing\Controller as BaseController;

class EquipController extends BaseController
{
    public function home()
    {
        // Leggo quale utente è connesso
        $user = User::find(session('user_id'));
        // Leggiamo i dati caricati
        $places = Place::all();
        $images = Image::all();
        $listFavorites = Favorite::all();
        if ($user->username == "admin"){
            return view('admin')
            ->with('username', $user->username);

        }
        else  {return view('equip')
            ->with('username', $user->username);
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $clientIdUnsplash = "TnOJSr9z7Tz3ywS8tbTq2jENSFlvj6-RRBDOhmwy1S4";
        $urlUnsplash = "https://api.unsplash.com/search/photos/?client_id=".$clientIdUnsplash."&query=".$query;
        $curlUnsplash = curl_init();
        curl_setopt($curlUnsplash, CURLOPT_URL,$urlUnsplash);
        curl_setopt($curlUnsplash,CURLOPT_RETURNTRANSFER,1);
        $resultUnsplash=json_decode(curl_exec($curlUnsplash),true);
        
        if($resultUnsplash === false)
        {
            echo "Error Number:".curl_errno($curlUnsplash)."<br>";
            echo "Error String:".curl_error($curlUnsplash);
        }

        curl_close($curlUnsplash);



        
        $clientIdPexels = "563492ad6f917000010000013af319bc4f924859a759b7b9af68e205";
        $urlPexels = "https://api.pexels.com/v1/search?query=". $query;
        $headers = array("Authorization: ".$clientIdPexels);
        $curlPexels = curl_init();
        curl_setopt($curlPexels, CURLOPT_URL,$urlPexels);
        curl_setopt($curlPexels, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlPexels, CURLOPT_HTTPHEADER, $headers);
        $resultPexels = json_decode(curl_exec($curlPexels),true);

        if($resultPexels === false)
        {
            echo "Error Number:".curl_errno($curlPexels)."<br>";
            echo "Error String:".curl_error($curlPexels);
        }

        curl_close($curlPexels);

        // Inizializza array
        $result = array();
        $result['unsplash']=$resultUnsplash;
        $result['pexels'] = $resultPexels;
       
        // Ritorna
        echo json_encode($result);
    }
}