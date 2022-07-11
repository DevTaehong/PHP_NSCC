<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyFirstController extends Controller
{
    public function index(){
        $startingYear = 2021;

        return view('subviews.myview', compact('startingYear'));
    }
}
