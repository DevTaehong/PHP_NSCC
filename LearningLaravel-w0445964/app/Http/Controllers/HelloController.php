<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function services()
    {
        // Model - singular
        // Service

        // Table - plural
        // services

        $services = \App\Service::all();
        return view('services', compact('services'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function tasks()
    {
        $tasks = \App\Task::all();
        return view('tasks', compact('tasks'));
    }
}
