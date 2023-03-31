<?php

use Illuminate\Support\Facades\Route;



#*****************************************#
#SUPER ADMIN#
Route::group(['namespace' => 'App\Http\Controllers\admins_side\super_admin', 'as' => 'super-admin.', 'prefix' => 'super-admin'], function () {
    #AUTH#
    Route::get('side', 'auth\LoginController@index')->name('side');
    Route::post('login', 'auth\LoginController@login')->name('login');
    Route::get('logout', 'auth\LogoutController@logout')->name('logout');

    Route::group(['middleware' => ['auth:super_admin'], 'as' => 'dashboard.', 'prefix' => 'dashboard'], function () {
        #ADMIN#
        Route::get('admin-index', 'dashboard\AdminController@index')->name('admin-index');
        Route::get('admin-create-view', 'dashboard\AdminController@createview')->name('admin-create-view');
        Route::post('admin-create', 'dashboard\AdminController@create')->name('admin-create');
        Route::get('admin-view/{id}', 'dashboard\AdminController@view')->name('admin-view');
        Route::post('admin-activate-deactivate', 'dashboard\AdminController@activateDeactivate')->name('admin-activate-deactivate');
        Route::post('admin-delete', 'dashboard\AdminController@delete')->name('admin-delete');
        Route::get('admin-update-view/{id}', 'dashboard\AdminController@updateView')->name('admin-update-view');
        Route::post('admin-update/{id}', 'dashboard\AdminController@update')->name('admin-update');

        #CAR MAKE#
        Route::get('car-make-index', 'dashboard\CarMakeController@index')->name('car-make-index');
        Route::get('car-make-create-view', 'dashboard\CarMakeController@createview')->name('car-make-create-view');
        Route::post('car-make-create', 'dashboard\CarMakeController@create')->name('car-make-create');
        Route::get('car-make-view/{id}', 'dashboard\CarMakeController@view')->name('car-make-view');
        Route::post('car-make-delete', 'dashboard\CarMakeController@delete')->name('car-make-delete');
        Route::get('car-make-update-view/{id}', 'dashboard\CarMakeController@updateView')->name('car-make-update-view');
        Route::post('car-make-update/{id}', 'dashboard\CarMakeController@update')->name('car-make-update');

        #CAR Model#
        Route::get('car-model-index', 'dashboard\CarModelController@index')->name('car-model-index');
        Route::get('car-model-create-view', 'dashboard\CarModelController@createview')->name('car-model-create-view');
        Route::post('car-model-create', 'dashboard\CarModelController@create')->name('car-model-create');
        Route::get('car-model-view/{id}', 'dashboard\CarModelController@view')->name('car-model-view');
        Route::post('car-model-delete', 'dashboard\CarModelController@delete')->name('car-model-delete');
        Route::get('car-model-update-view/{id}', 'dashboard\CarModelController@updateView')->name('car-model-update-view');
        Route::post('car-model-update/{id}', 'dashboard\CarModelController@update')->name('car-model-update');

        #Color#
        Route::get('color-index', 'dashboard\ColorController@index')->name('color-index');
        Route::get('color-create-view', 'dashboard\ColorController@createview')->name('color-create-view');
        Route::post('color-create', 'dashboard\ColorController@create')->name('color-create');
        Route::get('color-view/{id}', 'dashboard\ColorController@view')->name('color-view');
        Route::post('color-delete', 'dashboard\ColorController@delete')->name('color-delete');
        Route::get('color-update-view/{id}', 'dashboard\ColorController@updateView')->name('color-update-view');
        Route::post('color-update/{id}', 'dashboard\ColorController@update')->name('color-update');

        #Country#
        Route::get('country-index', 'dashboard\CountryController@index')->name('country-index');
        Route::get('country-create-view', 'dashboard\CountryController@createview')->name('country-create-view');
        Route::post('country-create', 'dashboard\CountryController@create')->name('country-create');
        Route::get('country-view/{id}', 'dashboard\CountryController@view')->name('country-view');
        Route::post('country-delete', 'dashboard\CountryController@delete')->name('country-delete');
        Route::get('country-update-view/{id}', 'dashboard\CountryController@updateView')->name('country-update-view');
        Route::post('country-update/{id}', 'dashboard\CountryController@update')->name('country-update');

        #City#
        Route::get('city-index', 'dashboard\CityController@index')->name('city-index');
        Route::get('city-create-view', 'dashboard\CityController@createview')->name('city-create-view');
        Route::post('city-create', 'dashboard\CityController@create')->name('city-create');
        Route::get('city-view/{id}', 'dashboard\CityController@view')->name('city-view');
        Route::post('city-delete', 'dashboard\CityController@delete')->name('city-delete');
        Route::get('city-update-view/{id}', 'dashboard\CityController@updateView')->name('city-update-view');
        Route::post('city-update/{id}', 'dashboard\CityController@update')->name('city-update');

        #Insurance Company#
        Route::get('insurance-company-index', 'dashboard\InsuranceCompanyController@index')->name('insurance-company-index');
        Route::get('insurance-company-create-view', 'dashboard\InsuranceCompanyController@createview')->name('insurance-company-create-view');
        Route::post('insurance-company-create', 'dashboard\InsuranceCompanyController@create')->name('insurance-company-create');
        Route::get('insurance-company-view/{id}', 'dashboard\InsuranceCompanyController@view')->name('insurance-company-view');
        Route::post('insurance-company-delete', 'dashboard\InsuranceCompanyController@delete')->name('insurance-company-delete');
        Route::get('insurance-company-update-view/{id}', 'dashboard\InsuranceCompanyController@updateView')->name('insurance-company-update-view');
        Route::post('insurance-company-update/{id}', 'dashboard\InsuranceCompanyController@update')->name('insurance-company-update');
        Route::post('insurance-company-delete-image', 'dashboard\InsuranceCompanyController@deleteImage')->name('insurance-company-delete-image');
    });
});

#*****************************************#


#*****************************************#
#ADMIN#
Route::group(['namespace' => 'App\Http\Controllers\admins_side\admin', 'as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('side', 'auth\LoginController@index')->name('side');
    Route::post('login', 'auth\LoginController@login')->name('login');
    Route::get('logout', 'auth\LogoutController@logout')->name('logout');
});
#*****************************************#



#*****************************************#
#COMMON#
Route::group(['namespace' => 'App\Http\Controllers\admins_side\common', 'as' => 'super-admin.', 'prefix' => 'super-admin'], function () {
    Route::group(['middleware' => ['auth:super_admin'], 'as' => 'dashboard.', 'prefix' => 'dashboard'], function () {
        //INDEX
        Route::get('index', 'dashboard\IndexController@index')->name('index');

        #Customers#
        Route::get('customer-index', 'dashboard\CustomerController@index')->name('customer-index');
        Route::get('customer-create-view', 'dashboard\CustomerController@createview')->name('customer-create-view');
        Route::post('customer-create', 'dashboard\CustomerController@create')->name('customer-create');
        Route::get('customer-view/{id}', 'dashboard\CustomerController@view')->name('customer-view');
        Route::post('customer-delete', 'dashboard\CustomerController@delete')->name('customer-delete');
        Route::get('customer-update-view/{id}', 'dashboard\CustomerController@updateView')->name('customer-update-view');
        Route::post('customer-update/{id}', 'dashboard\CustomerController@update')->name('customer-update');
        Route::get('get-car-models/{id}', 'dashboard\CustomerController@getCarModels')->name('get-car-models');
        Route::get('get-cities/{id}', 'dashboard\CustomerController@getCities')->name('get-cities');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\admins_side\common', 'as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::group(['middleware' => ['auth:admin', 'activeAdmin'], 'as' => 'dashboard.', 'prefix' => 'dashboard'], function () {
        //INDEX
        Route::get('index', 'dashboard\IndexController@index')->name('index');

        #Customers#
        Route::get('customer-index', 'dashboard\CustomerController@index')->name('customer-index');
        Route::get('customer-create-view', 'dashboard\CustomerController@createview')->name('customer-create-view');
        Route::post('customer-create', 'dashboard\CustomerController@create')->name('customer-create');
        Route::get('customer-view/{id}', 'dashboard\CustomerController@view')->name('customer-view');
        Route::post('customer-delete', 'dashboard\CustomerController@delete')->name('customer-delete');
        Route::get('customer-update-view/{id}', 'dashboard\CustomerController@updateView')->name('customer-update-view');
        Route::post('customer-update/{id}', 'dashboard\CustomerController@update')->name('customer-update');
        Route::get('get-car-models/{id}', 'dashboard\CustomerController@getCarModels')->name('get-car-models');
        Route::get('get-cities/{id}', 'dashboard\CustomerController@getCities')->name('get-cities');
    });
});
#*****************************************#
