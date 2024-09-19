@section('title')
List Tasks
@endsection

@extends('app')

@section('main')
<div class="container mt-5">
    <div class="row justify-content-center">

        <!-- show task -->
        @foreach($tasks as $task)
        <div class="col-sm-3 mb-2 mb-sm-0 m-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->name }}</h5>
                    <p class="card-text">{{ $task->description }}</p>
                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-primary">Show task</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection