@extends('app')

@section('title', 'Tasks')

@section('content')
    <h1>Welcome to Laravel 6 from Tasks</h1>

    <ul>
        @forelse($tasks as $task)
            <li>{{ $task->description }}</li>
        @empty
            <li>No Tasks available.</li>
        @endforelse
    </ul>
@endsection
