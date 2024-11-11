<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Show registration form
    public function showRegisterForm() {
        return view('admin/admin-create-acc');
    }

    // Register a new user
    public function register(Request $request) {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Ensure the table name matches the database
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8|same:password',
        ]);

        // Hash the password and create the user
        UserModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        return redirect()->route('login-form')->with('success', 'Account created. You can now log in.');
    }

    // Show login form
    public function showLoginForm() {
        return view('admin/login-page');
    }

    // Login the user
    public function login(Request $request) {
        // Validate the login request
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Check credentials and log in the user if they are valid
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard'); // Adjust to your actual dashboard route
        }

        return redirect()->route('admin.login')->withErrors(['email' => 'Invalid credentials.']);
    }
}
