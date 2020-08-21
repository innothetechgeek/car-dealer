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

Route::get('/', 'Auth\LoginController@showLoginForm')->name('/');

Route::get('/admin',function(){
    return view('admin');
})->middleware('auth');;

Route::post('car/add', 'CarController@add')->name('addcar')->middleware('auth');;

Route::get('car/add',function(){
    return view('car/add');
})->middleware('auth');;

Route::get('car/list', 'CarController@list')->middleware('auth');;
Route::post('car/delete', 'CarController@delete')->middleware('auth');

Route::get('car/edit', function(){
        return view('car/edit');
});

Auth::routes();

Route::get('registration-successful',function(){
    return view('registration_successful');
});
//Route::get('/home', 'HomeController@index')->name('home');
