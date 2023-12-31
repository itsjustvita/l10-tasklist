@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('styles')
    <style>
        label {
            display: block;
        }
        input, textarea {
            width: 100%;
            margin-bottom: 1rem;
        }
        button {
            padding: 0.5rem 1rem;
            background-color: #3490dc;
            color: #fff;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
        }
        .error-message{
            color: red;
        }
    </style>
@endsection

@section('content')
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task]) :  route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset

        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}">
            @error('title')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">
                Description
            </label>
            <textarea name="description" id="description" rows="5">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">
                Long Description
            </label>
            <textarea class="mb-4" name="long_description" id="long_description" rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button class="btn" type="submit">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>
        </div>
    </form>
@endsection

