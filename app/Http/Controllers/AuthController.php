<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function loginAction(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('show'));
        }

        $data = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($data)) {
            return redirect(route('show'));
        }
        return redirect(route('login'))->withErrors(['name' => 'Пользователь не найден, либо неверный пароль']);
    }

    public function loginForm()
    {
        if (Auth::check()) {
            return redirect(route('show'));
        }

        return view('user.loginForm', [
            'title' => 'titleLoginForm',
        ]);
    }




    public function registerForm()
    {
        if (Auth::check()) {
            return redirect(route('show'));
        }

        return view('user.registerForm', [
            'title' => 'titleRegisterForm',
        ]);
    }

    public function registerAction(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('addTask'));
        }

        $data = $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
        ]);

        if ($user) {
            Auth::login($user);
            return redirect(route('addTask'));
        }
    }




    public function logout(Request $request)
    {
        auth()->logout();

        return redirect(route('register'));
    }
}
