<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
Route::get('/', function () {
    return view('welcome');
});

Route::get('sample/', function () {
    return view('sample');
});

Route::get('user/', 'UserController@index');

Route::get('user/{id}/delete', [
    'as' => 'user.delete',
    'uses' => 'UserController@destroy'
]);

Route::get('user/{id}/edit', [
    'as' => 'user.edit',
    'uses' => 'UserController@edit'
]);

Route::post('user/update', array(
    'uses' => 'UserController@update'
));

Route::get('user/register', 'UserController@preRegister');

Route::post('user/register', array(
    'uses' => 'UserController@postRegister'
));

Route::resource('restUser', 'RestUserController');