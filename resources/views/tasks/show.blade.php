@section('title')
Task {{ $task->name }}
@endsection

@extends('app')

@section('main')
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- svi podaci jednog taska -->

        <div class="card text-center">
            <div class="card-header">
                Task
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $task->name }}</h5>
                <p class="card-text">{{ $task->description }}</p>
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: none;" id="delete-form">
                    @csrf
                    @method('DELETE')
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="btn btn-danger">Delete</a>
            </div>
            <div class="card-footer text-body-secondary">
                {{ $task->status }}, {{ convert($task->updated_at) }}, created by {{ $task->user->name }}.
            </div>
        </div>

    </div>
</div>
@endsection