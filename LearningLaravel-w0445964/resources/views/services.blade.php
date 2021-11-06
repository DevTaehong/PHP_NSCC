@extends('app')

@section('title', 'Services')

@section('content')
    <h1>Welcome to Laravel 6 from Services</h1>

    <ul>
        @forelse($services as $service)
            <li>{{ $service->name }}</li>
        @empty
            <li>No services available.</li>
        @endforelse
    </ul>
@endsection
