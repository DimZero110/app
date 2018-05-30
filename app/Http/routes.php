<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login','LoginController@login');
Route::get('/post_login','LoginController@post_login');
Route::get('/reg','LoginController@register');
Route::get('/post_reg','LoginController@post_reg');
Route::controller('login','LoginController');//提现控制器