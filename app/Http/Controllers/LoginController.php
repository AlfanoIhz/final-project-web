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
        return view('admin/register/admin-create-acc', ['title' => 'Register']);
    }

    // Register a new user
    public function register(Request $request) {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|min:3|max:255|unique:users',
            'email' => 'required|string|email:dns|max:255|unique:users',
            'password' => 'required|string|min:8|max:16|confirmed',
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
        return view('admin/login/login-page', ['title' => 'Login']);
    }

    // Login the user
    public function login(Request $request) {
        // Validate the login request
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|string|min:8|max:16',
        ]);

        // Check credentials and log in the user if they are valid
        if (Auth::attempt($credentials)) {
            $request ->session()->regenerate();

            return redirect()->intended('admin/dashboard');
        }

        return back()->with('loginError', 'Login Failed! Make sure your account is correct!')->withInput($request->only('email'));;
    }

    public function logout(Request $request) {
        Auth::logout();

        $request ->session()->invalidate();

        $request ->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
