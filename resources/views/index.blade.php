@extends('layouts.app')
@section('title', 'Tasks')

@section('content')
    <div>
        <nav class="mb-4">
            <a class="link" href="{{ route('tasks.create') }}">Add Task</a>
        </nav>

    </div>
    @forelse ($tasks as $task)
        <div class="post">
          <a @class(['line-through' => $task->completed]) href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <p>No tasks</p>
    @endforelse
    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection

