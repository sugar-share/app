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

use Illuminate\Support\Facades\Route;

Route::get('/', static function () {
    return view('home');
});
Route::get('/landing/', static function () {
    return view('landing');
});
Route::post('/landing/', static function (\Illuminate\Http\Request $request) {
    \Illuminate\Support\Facades\DB::insert(
        'INSERT INTO adopters(email, buy, sell, trade) VALUES (?, ?, ?, ?)',
        [
            $request->post('email') ?? '',
            $request->post('buy') !== null,
            $request->post('sell') !== null,
            $request->post('trade') !== null
        ]
    );

    return view('thanks');
});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{user}', 'ProfileController@view');
Route::get('/share/', 'ShareController@post');
