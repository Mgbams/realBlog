<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; //  I added this to combat undefined type Auth error

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
    // auth is a folder while login is a file in it. note we don't include the view folder in our link
    return view('auth.login'); 
});

// Home page generated by the application

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

// Pages i created

Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
//Route::get('/post', 'PostController@index');
Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');

