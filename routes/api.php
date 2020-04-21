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

//All Routes For FrontEnd
Route::group(['namespace' => 'client','prefix' => 'client'], function () {
    Route::get('experiences/home', 'ExperiencesController@index_home');
    Route::get('categories', 'CategoriesController@categories');
    Route::get('experiences', 'ExperiencesController@experiences');
    Route::get('experiences/category/{category}', 'ExperiencesController@getExperiencesByCateogy');
    Route::get('experience/detail/{slug}', 'ExperienceDetailController@getDetail');
    Route::get('experience/saved_date/{id}', 'ExperienceDetailController@getSavedDate');
});

//All Routes For Admin
Route::group(['namespace' => 'admin','prefix' => 'admin'], function () {

     //Auth
     Route::post('auth/login', 'AuthController@login');
     Route::post('auth/register', 'AuthController@register');

     //Only Auth User Allowed Route
       Route::group(['middleware' => 'auth:api'], function() {

            //User Auth & Profile
            Route::post('auth/logout', 'AuthController@logout');
            Route::get('auth/profile', 'AuthController@profile');
            Route::get('user/editProfile', 'ProfileController@editProfile');
            Route::post('user/saveProfile', 'ProfileController@saveProfile');
            Route::post('user/changePassword', 'ProfileController@changePassword');

            //Dashbaord
            Route::get('dashboard/widgets', 'DashboardController@getWidgets');

            //Categories
            Route::resource('categories', 'CategoriesController');
            Route::post('categories/{id}', 'CategoriesController@update');

            //Experiences
            Route::get('experiences/categories', 'ExperiencesController@categories');
            Route::get('experiences/schedule_dates/{id}', 'ExperiencesController@schedule_dates');
            Route::post('experiences/schedule_dates/{id}', 'ExperiencesController@save_schedule_dates');
            Route::post('experience/media/{id}', 'ExperiencesController@mediaUpload');
            Route::post('experience/mediaDelete/{id}', 'ExperiencesController@mediaDelete');
            Route::resource('experiences', 'ExperiencesController');
            Route::post('experiences/{id}', 'ExperiencesController@update');

            //Clients
            Route::resource('clients', 'ClientsController');
            Route::post('clients/{id}', 'ClientsController@update');

            //Vendors
            Route::resource('vendors', 'VendorsController');
            Route::post('vendors/{id}', 'VendorsController@update');

            //Company
            Route::get('company/editCompany', 'CompanyController@editCompany');
            Route::post('company/saveCompany', 'CompanyController@saveCompany');

            //Testimonial
            Route::resource('testimonials', 'TestimonialController');
            Route::post('testimonials/{id}', 'TestimonialController@update');

        });
});

