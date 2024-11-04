<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:user',
            'password' => 'required|string|min:6|confirmed'
        ]);

        // Exclude the _token field from the request data
        $data = $request->except('_token', 'password_confirmation');
        $data['password'] = bcrypt($request->password);

        // Insert the user into the database
        DB::table('user')->insert($data);

        // Redirect to the login page
        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }


    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        // Check if the user exists
        $user = User::where('email', $request->email)->first();

        //if its not a user, display message 
        if (!$user) {
            dd('Login attempt failed: No user found with email ' . $request->email);
            return back()->withErrors(['email' => 'No user found with this email.']);
        }

        // Check the password
        if (Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect('/')->with('success', 'Logged in successfully!');
        }

        dd('Login attempt failed: Invalid credentials for email ' . $request->email);
        return back()->withErrors(['email' => 'Invalid credentials']);
    }




    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }
}
