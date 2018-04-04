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

Route::get('/admin', function () {
    return view('/admin/index');
});
Route::get('/login', function () {
    return view('/login/login');
});

Route::get('/trainee', function () {
    return view('/trainee/index');

});