<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Issues extends Controller
{
    public function showForm()
    {
        $users= User::all();
        return view('issues.create', [
            'users'=> $users,
        ]);
    }
}
