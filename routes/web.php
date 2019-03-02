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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('album/index','AlbumsController@index');
Route::get('album/create','AlbumsController@create');
Route::post('album/store','AlbumsController@store');


Route::get('/home', 'HomeController@index')->name('home');

//Admin Controllers

Route::group(['prefix'=>'admin','as'=>'admin'],function (){
    Route::get('/','AdminController@index');
    Route::get('/dashboard','AdminController@index');
});

