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

     //Auth
     Route::post('admin/auth/login', 'AuthController@login');
     Route::post('admin/auth/register', 'AuthController@register');

     //Only Auth User Allowed Route
       Route::group(['middleware' => 'auth:api'], function() {

            //User Auth & Profile
            Route::post('admin/auth/logout', 'AuthController@logout');
            Route::get('admin/auth/profile', 'AuthController@profile');
            Route::get('admin/user/editProfile', 'ProfileController@editProfile');
            Route::post('admin/user/saveProfile', 'ProfileController@saveProfile');
            Route::post('admin/user/changePassword', 'ProfileController@changePassword');

            //Dashbaord
            Route::get('admin/dashboard/widgets', 'DashboardController@getWidgets');

            //Categories
            Route::resource('admin/categories', 'CategoriesController');
            Route::post('admin/categories/{id}', 'CategoriesController@update');

            //Experiences
            Route::get('admin/experiences/categories', 'ExperiencesController@categories');
            Route::post('admin/experience/media/{id}', 'ExperiencesController@mediaUpload');
            Route::post('admin/experience/mediaDelete/{id}', 'ExperiencesController@mediaDelete');
            Route::resource('admin/experiences', 'ExperiencesController');
            Route::post('admin/experiences/{id}', 'ExperiencesController@update');

            //Clients
            Route::resource('admin/clients', 'ClientsController');
            Route::post('admin/clients/{id}', 'ClientsController@update');

            //Vendors
            Route::resource('admin/vendors', 'VendorsController');
            Route::post('admin/vendors/{id}', 'VendorsController@update');

            //Company
            Route::get('admin/company/editCompany', 'CompanyController@editCompany');
            Route::post('admin/company/saveCompany', 'CompanyController@saveCompany');

            //Testimonial
            Route::resource('admin/testimonials', 'TestimonialController');
            Route::post('admin/testimonials/{id}', 'TestimonialController@update');

        });
});

