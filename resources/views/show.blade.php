@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="mb-4">
        <a class="link" href="{{ route('tasks.index') }}">Back</a>
    </div>
    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    <p class="mb-4 text-sm text-slate-500">Erstellt: {{ $task->created_at->diffForHumans() }} •  Bearbeitet: {{ $task->updated_at->diffForHumans() }}</p>

    <p class="mb-4">
        @if($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not completed</span>
        @endif
    </p>
    <div class="mb-4 flex gap-2">
        <a class="btn" href="{{ route('tasks.edit', ['task' => $task]) }}">Editieren
        </a>

        <form method="POST" action="{{ route('tasks.complete', ['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button class="btn" type="submit">Mark as {{ $task->completed ? 'not completed' : 'completed' }}</button>
        </form>

        <form method="POST" action="{{ route('tasks.destroy', ['task' => $task]) }}">
            @csrf
            @method('DELETE')
            <button class="btn" type="submit">Delete</button>
        </form>
    </div>

@endsection
