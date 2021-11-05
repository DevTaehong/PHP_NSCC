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
        $services = [
            'Cool Service',
            'Another Cool service'
        ];
        return view('services', compact('services'));
    }

    public function contact()
    {
        return view('contact');
    }
}
