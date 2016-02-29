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

Route::get('/', function () {
    return \Illuminate\Support\Facades\Redirect::to('login');
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

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['auth']], function () {

            Route::get('cards', 'CardController@cards');
            Route::get('cards/{card}', 'CardController@shows');
            Route::post('cards/{card}/notes', 'CardController@addnote');
            Route::post('cards/{card}/photo', ['as' => 'storephoto', 'uses' => 'CardController@addphoto']);
            Route::resource('demo', 'CardController');
            Route::get('{title}', 'CardController@show');

    });

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
});
