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

Route::get('/', function () {
    return view('login');
})->name('/');

Route::get('/admin',function(){
    return view('admin');
});

Route::post('car/add', 'CarController@add')->name('addcar');

Route::get('car/add',function(){
    return view('car/add');
});

Route::get('car/list', 'CarController@list');



Auth::routes();

Route::get('registration-successful',function(){
    return view('registration_successful');
});
//Route::get('/home', 'HomeController@index')->name('home');
