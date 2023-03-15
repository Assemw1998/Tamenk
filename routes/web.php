<?php

use Illuminate\Support\Facades\Route;



#*****************************************#
#SUPER ADMIN#
Route::group(['namespace' => 'App\Http\Controllers\admins_side\super_admin','as'=>'super-admin.','prefix'=>'super-admin'], function()
{ 
    #AUTH#
    Route::get('side', 'auth\LoginController@index')->name('side');
    Route::post('login', 'auth\LoginController@login')->name('login');
    Route::get('logout', 'auth\LogoutController@logout')->name('logout');

    Route::group(['middleware' => ['auth:super_admin'],'as'=>'dashboard.','prefix'=>'dashboard'], function() {
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

    });

});

#*****************************************#


#*****************************************#
#ADMIN#
Route::group(['namespace' => 'App\Http\Controllers\admins_side\admin','as'=>'admin.','prefix'=>'admin'], function()
{ 
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
        Route::get('index', 'IndexController@index')->name('index');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\admins_side\common', 'as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::group(['middleware' => ['auth:admin','activeAdmin'], 'as' => 'dashboard.', 'prefix' => 'dashboard'], function () {
        //INDEX
        Route::get('index', 'IndexController@index')->name('index');
    });
});
#*****************************************#

