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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function() {
    Route::resource('partner', 'PartnerController', ['names' => 'admin.partner']);
    Route::resource('splash', 'PartSplashController', ['names' => 'admin.splash']);
    Route::resource('promo', 'PromoController', ['names' => 'admin.promo']);

    //Customer, and Order
    Route::resource('customer', 'CustomerController', ['names' => 'admin.customer']);
    Route::get('customer/{id}/editpass', 'CustomerController@editPass')->name('admin.customer.editpass');
    Route::put('customer/{id}/editpass', 'CustomerController@updatePass')->name('admin.customer.updatepass');


    //Job
    Route::resource('job', 'JobController', ['names' => 'admin.job']);
    Route::resource('architect', 'ArchitectController', ['names' => 'admin.architect']);
    Route::get('architect/{id}/image/', 'ArchitectController@getUploadImage')->name('admin.architect.image');
    Route::post('architect/{id}/image', 'ArchitectController@postUploadImage')->name('admin.architect.upload');
    Route::delete('architect/{id}/image', 'ArchitectController@deleteUploadImage')->name('admin.architect.delimage');


    //Setting
    Route::resource('setting', 'SettingController', ['names' => 'admin.setting']);
    Route::resource('status', 'StatusController', ['names' => 'admin.status']);
    Route::resource('city', 'CityController', ['names' => 'admin.city']);
    Route::resource('cost', 'CostController', ['names' => 'admin.cost']);
});

Route::group(['prefix' => 'api/table'], function() {
    Route::get('partner', 'PartnerController@getPartnerData')->name('api.partner.data');
    Route::get('splash', 'PartSplashController@getSplashData')->name('api.splash.data');
    Route::get('promo', 'PromoController@getPromoData')->name('api.promo.data');

    Route::get('customer', 'CustomerController@getCustomerData')->name('api.customer.data');


    Route::get('job', 'JobController@getJobData')->name('api.job.data');
    Route::get('cost', 'CostController@getCostData')->name('api.cost.data');
    Route::get('architect', 'ArchitectController@getArchitectData')->name('api.architect.data');

    Route::get('status', 'StatusController@getStatusData')->name('api.status.data');
    Route::get('city', 'CityController@getCityData')->name('api.city.data');
});
