<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(Request $request){
        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Password::min(6) , 'confirmed'], //password_confirmation
        ]);
        $user = User::create($attributes);
//        auth()->login($user);
        return redirect('/login');
    }
}
