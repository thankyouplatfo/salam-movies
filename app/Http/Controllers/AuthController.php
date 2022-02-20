<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if (!auth()->attempt($request->only('email', 'password'))) {

            $error = \Illuminate\Validation\ValidationException::withMessages([

                'email' => [__('auth.failed')],
            ]);
            throw $error;
        }

        return redirect()->route('admin.categories');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
