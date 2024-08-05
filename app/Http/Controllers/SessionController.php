<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request){
        $attributes = request()->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);
        if(!auth()->attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'The provided credentials are incorrect.'
            ]);
        }
        request()->session()->regenerate();
        return redirect('/jobs');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}
