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
Route::get('/service', 'ServiceController@index');
Route::get('/contact', 'HelloController@contact');
Route::get('/task', 'TaskController@index');

Route::post('/service', 'ServiceController@store');
Route::post('/task', 'TaskController@store');

Route::get('/customers', 'CustomerController@index');
Route::get('/customers/create', 'CustomerController@create');
Route::post('/customers', 'CustomerController@store');
Route::get('/customers/{customer}', 'CustomerController@show');
Route::get('/customers/{customer}/edit', 'CustomerController@edit');
Route::patch('/customers/{customer}/', 'CustomerController@update');





Route::get('/myroute', 'MyFirstController@index');

