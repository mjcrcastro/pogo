<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', array('as' => 'welcome', 'uses' => 'HomeController@doWelcome'));

Route::get('/how', function () {
    return view('how');
});

Route::resource('users', 'UserController')->middleware('auth');

//route to register a new user (can't use users resources since it is auth protected
Route::post('storeuser', array('uses' => 'HomeController@storeUser'));

// route to show the login form
Route::get('login', array('as' => 'login', 'uses' => 'HomeController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));

//route to log user out
Route::get('logout', array('uses' => 'HomeController@doLogout'));
