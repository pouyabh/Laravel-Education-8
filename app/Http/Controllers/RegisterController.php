<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:2', 'max:50'],
            'username' => ['required', 'min:2', 'max:50', Rule::unique('users', 'username')],
            'email' => ['required', 'min:2', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'max:50']
        ]);

        User::create($attributes);


        return redirect('/');
    }
}
