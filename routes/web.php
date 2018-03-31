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
Route::get('/register', '\App\Http\Controllers\Web\Login@register');
Route::post('/register', '\App\Http\Controllers\Web\Login@toregister');
Route::get('/login', '\App\Http\Controllers\Web\Login@login');
Route::post('/login', '\App\Http\Controllers\Web\Login@tologin');
Route::get('/logout', '\App\Http\Controllers\Web\Login@logout');
Route::post('/checkname', '\App\Http\Controllers\Web\Login@checkname');

Route::get('/index', '\App\Http\Controllers\Web\Index@index');
Route::get('/main', '\App\Http\Controllers\Web\Index@main');
