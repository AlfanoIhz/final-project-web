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
    public function showAdminRegisterForm() {
        if (auth()->check()) {
            $role = auth()->user()->role;
            
            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role === 'user') {
                return redirect()->route('user.menu');
            } else {
                return redirect()->route('landing-page')->with('error', 'Unauthorized access.');
            }
        }
        return view('admin/register/admin-create-acc', ['title' => 'Register']);
    }

    // Show login form
    public function showAdminLoginForm() {
        
        if (auth()->check()) {
            $role = auth()->user()->role;

            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role === 'user') {
                return redirect()->route('user.menu');
            } else {
                return redirect()->route('landing-page')->with('error', 'Unauthorized access.');
            }
        }
        return view('admin/login/login-page', ['title' => 'Login']);
    }

    public function showUserRegisterForm() {
        
        if (auth()->check()) {
            $role = auth()->user()->role;

            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role === 'user') {
                return redirect()->route('user.menu');
            } else {
                return redirect()->route('landing-page')->with('error', 'Unauthorized access.');
            }
        }

        return view('user/login/user-register', ['title' => 'Register']);
    }
    
    // Show login form
    public function showUserLoginForm() {
        
        if (auth()->check()) {
            $role = auth()->user()->role;
            
            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role === 'user') {
                return redirect()->route('user.menu');
            } else {
                return redirect()->route('landing-page')->with('error', 'Unauthorized access.');
            }
        }
        return view('user\login\user-login', ['title' => 'Login']);
    }

    // Register a new user
    public function adminRegister(Request $request) {
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

        return redirect()->route('admin.login-form')->with('success', 'Account created. You can now log in.');
    }

    // Login the user
    public function adminLogin(Request $request) {
        // Validate the login request
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|string|min:8|max:16',
        ]);

        // Check credentials and log in the user if they are valid
        if (Auth::attempt($credentials)) {
            $request ->session()->regenerate();
            // if (Auth::user()->role === 'admin') {
            //     return redirect()->route('admin.dashboard');
            // } elseif (Auth::user()->role === 'customer') {
            //     return redirect()->route('customer.dashboard');
            // }

            return redirect()->intended('admin/dashboard');
        }

        return back()->with('loginError', 'Login Failed! Make sure your account is correct!')->withInput($request->only('email'));;
    }

    public function userRegister(Request $request) {
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
            'role' => 'user',
        ]);

        return redirect()->route('user.login-form')->with('success', 'Account created. You can now log in.');
    }
    

    public function userLogin(Request $request) {
        // Validate the login request
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|string|min:8|max:16',
        ]);

        // Check credentials and log in the user if they are valid
        if (Auth::attempt($credentials)) {
            $request ->session()->regenerate();
            // $user = Auth::user();
            // dd('User  logged in:', $user, 'Role:', $user->role);
            return redirect()->route('user.menu');
        }

        return back()->with('loginError', 'Login Failed! Make sure your account is correct!')->withInput($request->only('email'));;
    }

    public function logout(Request $request) {
        $role = Auth::user()->role;

        Auth::logout();
        // Invalidate the session
        $request->session()->invalidate();
    
        // Regenerate the session token
        $request->session()->regenerateToken();
    
        if ($role === 'admin') {
            return redirect()->route('admin.login-form')->with('success', 'You have been logged out.');
        } elseif ($role === 'user') {
            return redirect()->route('user.login-form')->with('success', 'You have been logged out.');
        }
    
        return redirect('/')->with('success', 'You have been logged out.');
    }
}
