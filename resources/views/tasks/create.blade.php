@section('title')
Create Tasks
@endsection

@extends('app')

@section('main')
<div class="container mt-5">
    <div class="row justify-content-center">

        <!-- insert form task -->
        <form @if(isset($task)) action="{{ route('tasks.update', $task->id) }}" @else action="{{ route('tasks.store') }}" @endif method="post" >
            @csrf
            @if(isset($task)) @method('put') @endif
            <div class="mb-3">
                <label for="nameTask" class="form-label">Name</label>
                <input type="text" class="form-control" id="nameTask" name="nameTask" placeholder="Task name" @if(isset($task)) value="{{ $task->name }}" @else value="{{ old('nameTask') }}" @endif >
                @if($errors->has('nameTask')) <p class="text-danger">* This is required</p> @endif
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="10">@if(isset($task)) {{ $task->description }} @else {{ old('description') }} @endif</textarea>
                @if($errors->has('description')) <p class="text-danger">* This is required</p> @endif
            </div>
            <div class="mb-3">
                <select class="form-select" name="status" id="status" aria-label="Status of task">
                    <option selected>Select status</option>
                    <option>Waiting</option>
                    <option>Started</option>
                    <option>In Proccess</option>
                    <option>Pause</option>
                    <option>Finished</option>
                </select>
                @if($errors->has('status')) <p class="text-danger">* This is required</p> @endif
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>

    </div>
</div>
@endsection