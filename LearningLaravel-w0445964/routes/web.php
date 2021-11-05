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

Route::get('/hello', function (){
    $coolString = 'Hello from Routes AGAIN.';

    return view('subviews.hello', compact('coolString'));
});

Route::get('/myroute', function (){
    $startingYear = 2021;

    return view('subviews.myview', compact('startingYear'));
});

