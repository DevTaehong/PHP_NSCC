<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = \App\Customer::all();

        return view('customer.index', compact('customers'));
    }

    protected function create()
    {
        return view('customer.create');
    }

    protected function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        \App\Customer::create($data);

        return redirect('/customers');
    }

    public function show(\App\Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    public function edit(\App\Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    public function update(\App\Customer $customer)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $customer->update($data);

        return redirect('/customers');
    }
}
