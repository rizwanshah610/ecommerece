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


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/logout','Auth\LoginController@logout');


            ///////////////
            // Front End  /
            //////////////


Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shirts', 'HomeController@shirts')->name('shirts');
Route::get('/shirt', 'HomeController@shirt')->name('shirt');

//Checkout Controller
Route::get('/checkout','CheckoutController@shipping');

            //////////
            // Cart//
            ////////
Route::get('/cart','CartController@index');
Route::get('/cart/create/{id}','CartController@create');
Route::post('/cart/update/{id}','CartController@update');
Route::post('/cart/delete/{id}','CartController@destroy');



            /////////////
            //Back End//
            ///////////

            ///////////////
            //Admin Routes/
            //////////////


Route::group(['prefix'=>'admin','as'=>'admin','middleware'=>['auth','admin']],function (){

    Route::get('/','AdminController@index');
    Route::get('/index','AdminController@index');

            ///////////
            //Products/
            //////////

    Route::get('/products','ProductsController@index');
    Route::get('/product/create','ProductsController@create');
    Route::post('/product/store','ProductsController@store');

            /////////////
            //Categories/
            ////////////

    Route::get('/categories','CategoriesController@index');
    Route::get('/categories/add','CategoriesController@create');
    Route::post('/categories/store','CategoriesController@store');
    Route::get('/categories/show/{id}','CategoriesController@show');



});

