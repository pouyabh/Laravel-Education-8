<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:50|min:2',
            'username' => 'required|max:50|min:2',
            'email' => 'required|max:50|min:2',
            'password' => 'required|max:50|min:2'
        ]);

        User::create($attributes);


        return redirect('/');
    }
}
