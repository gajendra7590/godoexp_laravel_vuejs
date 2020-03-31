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

//Admin Router For View JS
Route::get('/admin/login', 'HomeController@auth');
Route::get('/admin/forgot-password', 'HomeController@auth');


Route::get('/admin/{any}', 'HomeController@adminHome')->where('any', '.*');
Route::any('/admin', 'HomeController@auth');
Route::redirect('/login', '/admin/dashboard');



