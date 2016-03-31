<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middleware' => 'web'], function () {

    Route::group(['namespace' => 'Home'], function () {
        Route::get('/', 'IndexController@index');
    });
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
        //��̨��ҳ
        Route::get('/', 'IndexController@index');
    });
});

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
       Route::get('/', 'IndexController@index');

    Route::patch('/brand/sort_order', 'BrandController@sort_order');
    Route::patch('/brand/is_show', 'BrandController@is_show');
    //��ƷƷ��
    Route::resource('brand', 'BrandController');


    Route::patch('/category/sort_order', 'CategoryController@sort_order');
    Route::patch('/category/is_show', 'CategoryController@is_show');
    //��Ʒ��Ŀ
    Route::resource('category', 'CategoryController');





    //��Ʒ�б�goods
    Route::patch('/good/change_attr', 'GoodController@change_attr');
    Route::get('/good/search', 'GoodController@search');

    Route::resource('good', 'GoodController');


    //����վ
    Route::get('/trash/{id}/restore', 'TrashController@restore');
    Route::get('/trash/{id}/forceDelete', 'TrashController@forceDelete');
    Route::get('/trash', 'TrashController@index');


    //��������

    Route::get('/express', 'ExpressController@index');
    });

});

Route::post('/upload', 'FileController@upload');