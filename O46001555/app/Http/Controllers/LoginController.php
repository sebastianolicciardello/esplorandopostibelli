<?php
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Place;
use App\Models\Image;

class LoginController extends BaseController
{
    public function login()
    {
        // login già effettuato
        if(session('user_id') != null)
        {
            return redirect('home');
        }
        else
        {
            // Verifichiamo se c'è stato un errore nel login
            $old_username = Request::old('username');
            return view('login')
                ->with('csrf_token', csrf_token())
                ->with('old_username', $old_username);
        }
    }

    public function checkLogin()
    {
        // verifico utente nel database
        $user = User::where('username', request('username'))->where('password', request('password'))->first();
        if(isset($user))
        {
            // Credenziali valide
            Session::put('user_id', $user->id);
            return redirect('home');
        }
        else
        {
            // Credenziali non valide
            return redirect('login')->withInput();
        }
    }

    public function logout()
    {
        // Eliminiamo i dati di sessione
        Session::flush();
        // Torniamo al welcome
        return redirect('/');
    }
}
