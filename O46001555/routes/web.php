<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    //controlla se già loggato
    if(session('user_id') != null)
        {
            return redirect('home');
        }
    else
        return view('welcome');
});

Route::get('login', 'LoginController@login');
Route::post('login', 'LoginController@checkLogin');
Route::get('logout', 'LoginController@logout');

Route::get('register', "RegisterController@index");
Route::post('register', "RegisterController@create");
Route::post('/register/checkUsername', 'RegisterController@checkUsername')->name('register.checkUsername');  

Route::get('home', 'HomeController@home');
Route::get('/home/adminlist', 'HomeController@updateListAdmin');
Route::get('/home/placelist', 'HomeController@updatePlace');
Route::post('/home/ratings', 'HomeController@updateRatings');
Route::post('/home/addPlace', 'HomeController@addPlace')->name('home.addPlace');  
Route::post('/home/addVote', 'HomeController@addVote');
Route::post('/home/loadDetails', 'HomeController@loadDetails');
Route::post('/home/switchFavorite', 'HomeController@switchFavorite');  
Route::get('/home/removePlace/{nome}','HomeController@removePlace');


Route::get('addFavorites/{id}','FavoritesController@addFavorites');
Route::get('removeFavorites/{id}','FavoritesController@removeFavorites');

Route::get('equip', 'EquipController@home');
Route::post('/equip/search', 'EquipController@search');

Route::get('chat', 'ChatController@home');
Route::get('/chat/update', 'ChatController@update');
Route::post('/chat/add', 'ChatController@add')->name('chat.add');
Route::get('/chat/remove/{id}','ChatController@remove');