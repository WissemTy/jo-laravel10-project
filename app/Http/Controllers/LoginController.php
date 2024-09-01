<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === 'admin' && $password === 'password') {
            return redirect()->route('admin.panel');
        } else {
            return back()->with('error', 'Nom d\'utilisateur ou mot de passe incorrect.');
        }
    }
}
