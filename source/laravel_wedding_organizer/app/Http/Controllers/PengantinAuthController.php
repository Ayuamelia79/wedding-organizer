<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PengantinAuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.pengantin-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pengantin',
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('pengantin.dashboard');
    }

    public function showLogin()
    {
        return view('auth.pengantin-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'pengantin';

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard-pengantin');
        }

        return back()->withErrors([
            'login' => 'Email atau password salah!'
        ]);
    }

    public function dashboard()
    {
        return view('pengantin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('pengantin.login');
    }
}
