<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = \App\Task::all();
        return view('task.index', compact('tasks'));
    }

    public function store()
    {
        $data = request()->validate([
            'description' => 'required|min:5|'
        ]);
        \App\Task::create($data);


        return redirect()->back(); // Just going back to the page
    }
}
