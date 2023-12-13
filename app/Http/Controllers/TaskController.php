<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Task;

class TaskController extends Controller
{
    public function create()
    {
        if (!Auth::check()) {
            return redirect(route('register'));
        }

        return view('task.createTaskForm', [
            'title' => 'titleTaskCreateForm',
        ]);
    }

    public function createAction(Request $request)
    {
        if (!Auth::check()) {
            return redirect(route('register'));
        }

        $data = $request->validate([
            'task' => ['required'],
        ]);

        $user_id = auth()->user();

        $user = Task::create([
            'text' => $data['task'],
            'user_id' => $user_id->id,
        ]);

        return redirect(route('addTask'));
    }

    public function show()
    {
        if (!Auth::check()) {
            return redirect(route('register'));
        }

        $user_id = auth()->user()->id;

        $users = User::all();

        return view('task.show', [
            'title' => 'titleShow',
            'users' => $users,
            'user_id' => $user_id,
        ]);
    }

    public function delete($id)
    {
        if (!Auth::check()) {
            return redirect(route('register'));
        }

        Task::destroy($id);

        return redirect(route('show'));
    }
}
