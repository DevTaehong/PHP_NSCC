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

Route::get('/about', 'HelloController@about');
Route::get('/services', 'HelloController@services');
Route::get('/contact', 'HelloController@contact');
Route::get('/tasks', 'HelloController@tasks');







Route::get('/myroute', 'MyFirstController@index');

