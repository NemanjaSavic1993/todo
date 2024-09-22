<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function tasks(User $user){
        $allTasks = $user->task;

        return view('users.tasks', compact('allTasks'));
    }

    public function destroy(User $user){

        $user->delete();

        return redirect('tasks')->with('deleted', 'User has been deleted');
    }
}
