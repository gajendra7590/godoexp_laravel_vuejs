<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'admin'], function () {

    //Categories
    Route::resource('admin/categories', 'CategoriesController');
    Route::post('admin/categories/{id}', 'CategoriesController@update');

    //Experiences
    Route::resource('admin/experiences', 'ExperiencesController');
    Route::post('admin/experiences/{id}', 'ExperiencesController@update');

    //Clients
    Route::resource('admin/clients', 'ClientsController');
    Route::post('admin/clients/{id}', 'ClientsController@update');

     //Vendors
     Route::resource('admin/vendors', 'VendorsController');
     Route::post('admin/vendors/{id}', 'VendorsController@update');

});

