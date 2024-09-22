@section('title')
List Users
@endsection

@extends('app')

@section('main')
<div class="container mt-5">
    <div class="row justify-content-center">

        <h1>Users view</h1>

        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Tasks</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ convert($user->created_at) }}</td>
                        <td><a href="/user/{{ $user->id }}/tasks" class="btn btn-primary">Tasks</a></td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;" id="delete-form_{{$user->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form_{{$user->id}}').submit();" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection