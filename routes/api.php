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

Route::get('listUsers','UserController@listUser');
Route::get('showUsers/{id}','UserController@showUser');
Route::post('createUsers','UserController@createUser');
Route::put('updateUsers/{id}','UserController@updateUser');
Route::delete('deleteUsers/{id}','UserController@deleteUser');
/* API */
/* sempre na ordem get post put delete */



