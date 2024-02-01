<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\validate;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    public function index() 
    {
        return view('login-register.index');
    }

    public function create(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|confirmed',
        ]);

        $username = $validate['username'];
        $email = $validate['email'];
        $password = $validate['password'];

        $user = User::create([
            'name' => $username,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $user->save();

        auth()->login($user);

        return redirect('/');
    }
}
