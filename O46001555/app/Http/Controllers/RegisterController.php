<?php
use Illuminate\Support\Facades\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Place;
use App\Models\Image;

class RegisterController extends Controller {

    protected function create()
    {
        $request = request();
        
            $newUser =  User::create([
            'username' => $request['username'],
            'password' => $request['password'],
            ]); 
            if ($newUser) {
                Session::put('user_id', $newUser->id);
                return redirect('home');
            } 
            else {
                return redirect('register')->withInput();
            }
        
        
}

    public function index() {
         // login già effettuato
         if(session('user_id') != null)
         {
             return redirect('home');
         }

        return view('register');
    } 

    public function checkUsername() { //deve ritornare 1 se esiste
        $request = request();
        if($request->send && User::where("username", $request->send)->first()) return 1;
        else return 0;
    }

}