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
 

//Admin Common Route
Route::group(['prefix' => 'admin'], function(){   
    Route::get('/login', 'HomeController@auth');
    Route::get('/forgot-password', 'HomeController@auth'); 
    Route::get('/{any}', 'HomeController@adminHome')->where('any', '.*');   
});     

//Frontend Router
Route::get('/{any}', 'HomeController@frontHome')->where('any', '.*');






