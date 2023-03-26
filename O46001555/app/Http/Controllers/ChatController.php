<?php
use App\Models\Favorite;
use App\Models\User;
use App\Models\Place;
use App\Models\Image;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Routing\Controller as BaseController;

class ChatController extends BaseController
{
    public function home()
    {
        // Leggo quale utente è connesso
        $user = User::find(session('user_id'));
        if ($user->username == "admin"){
            return view('admin')
            ->with('username', $user->username);
        }
        else  {
            return view('chat')
            ->with('username', $user->username);
        }
    }

    public function add(Request $request){
        $user = User::find(session('user_id'));
        $messaggio = $request->input('messaggio');

            // Aggiungi messaggio
            Message::create([
                'user' => $user->id,
                'text' => $messaggio
            ]);
    }

    public function remove($id){
        $user = User::find(session('user_id'));
        if ($user->username == "admin"){
            Message::destroy($id);
        }
       
    }

    public function update(){
      // Inizializza array di messaggi
      $messaggi = array();
      // Leggi messaggi
      $res = Message::latest()->get();
      
      for( $i = 0; $i < count($res); ++$i){
          $messaggi[$i]=$res[$i];
          $user=User::where('id', $res[$i]->user)->first();
          $messaggi[$i]->user = $user->username;
      }
      
      // Ritorna
      echo json_encode($messaggi);
    }
}