<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AdminController extends Controller
{


    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email or password is incorrect.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }



        public function index()
    {
        return view('admin.admin');
    }

   /////////////////////////////////////////////////////////////////


    /**
     * Shows the update profile form
     */
    public function edit()
    {
        // Login is done via Auth::attempt(), so Auth::check() is the correct approach
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Please login first.');
        }

        return view('admin.update');
    }

    /**
     * This method runs when the form is submitted
     */
    public function update(Request $request)
    {
        // --- Step 0: Get the logged-in user from Auth (login happens via Auth::attempt) ---
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Please login first.');
        }

        $user = Auth::user(); // this is already the current logged-in User model instance

        // --- Step 1: Validation ---
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', 'string'],
            'email'             => ['nullable', 'email', 'unique:users,email,' . $user->id],
            'password'          => ['nullable', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.required' => 'Current password is required.',
            'email.email'                => 'Email format is not correct.',
            'email.unique'                => 'This email is already in use by another account.',
            'password.min'                => 'Password must be at least 8 characters.',
            'password.confirmed'          => 'Password and confirm password do not match.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // --- Step 2: At least one field must be provided ---
        if (!$request->filled('email') && !$request->filled('password')) {
            return redirect()->back()
                ->withErrors(['current_password' => 'Update at least email or password.'])
                ->withInput();
        }

        // --- Step 3: Verify current password (this is a MUST) ---
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()
                ->withErrors(['current_password' => 'Current password is incorrect.'])
                ->withInput();
        }

        // --- Step 4: Only update the fields that were provided ---
        if ($request->filled('email') && $request->email !== $user->email) {
            $user->email = $request->email;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // --- Step 5: Send back with success message ---
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}