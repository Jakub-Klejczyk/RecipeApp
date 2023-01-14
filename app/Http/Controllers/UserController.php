<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed'
        ]);

        //hash password
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/');
    }

    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back();
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/logowanie');
    }
}
