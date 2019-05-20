<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route for registration


Route::get('/register', function () {
    return view('register');
});

Route::post('/register',function(){
    $userdetails = new App\Users;
    $userdetails->email= Input::get('email');
    $userdetails->username= Input::get('username');
    $userdetails->password= Hash::make(Input::get('password'));
    $userdetails->save();

    $theEmail = Input::get('email');

    return View::make('thanks')->with('theEmail', $theEmail);
});


Route::get('/login',function(){
    return view('login');
});


Route::get('/logout',function(){

    Auth::logout();
    return view('logout');
});

Route::get('/home', function()
{
    return View::make('home');
})->middleware('auth.basic');

Route::post('/login',function()
{
    $credentials = Input::only('username', 'password');

    if(Auth::attempt($credentials))
    {
        return Redirect::to('home');
    }
    return Redirect::to('login');
});

Route::resource('posts', 'PostController');
