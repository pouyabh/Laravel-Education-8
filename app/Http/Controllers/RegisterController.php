<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

        $user = User::create($attributes);

        Auth()->login($user);

        return redirect('/')->with('success', 'Your Account Has Been Created');
    }
}
