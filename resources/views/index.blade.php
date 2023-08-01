@extends('layouts.app')
@section('title', 'Tasks')

@section('content')

    @forelse ($tasks as $task)
        <div class="post">
            <h1><a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a></h1>
        </div>
    @empty
        <p>No tasks</p>
    @endforelse

@endsection

