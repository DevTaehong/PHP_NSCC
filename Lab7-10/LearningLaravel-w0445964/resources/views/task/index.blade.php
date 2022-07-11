@extends('app')

@section('title', 'Tasks')

@section('content')
    <h1>Welcome to Laravel 6 from Tasks</h1>

    <form action="/task" method="post">
        <input type="text" name="description" autocomplete="off">


        @csrf

        <button>Add task</button>
    </form>
    <p style="color: red">@error('description') {{ $message }} @enderror</p>

    <ul>
        @forelse($tasks as $task)
            <li>{{ $task->description }}</li>
        @empty
            <li>No Tasks available.</li>
        @endforelse
    </ul>
@endsection
