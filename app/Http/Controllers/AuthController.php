<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{   
    //Signup Page View
    public function showRegister() {
        return view('auth.register');
    }
    //Login Route View
    public function showLogin() {
        return view('auth.login');
    }

    // User Registration/sign up new users
    public function register(Request $request) {
        $dataValidated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);   
        
        User::create([
            'name' => $dataValidated['name'],
            'email' => $dataValidated['email'],
            'password' => Hash::make($dataValidated['password']),
        ]);

        return redirect()->route('show.login');
    }   

    // Validating login credentials
    public function loginAuth(Request $request) {
        $validatedCredentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($validatedCredentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
        }
    }

    // AUTH FOR LOGOUT 
    public function logout() {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', 'Logged out successfully!');
    }
}
