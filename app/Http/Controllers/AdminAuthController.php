<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|confirmed',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, 
        ]);

        return redirect()->route('admin.login.form')->with('success', 'Registration successful!');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    $admin = Admin::where('email', $request->email)->first();

    if ($admin && $admin->password === $request->password) {
        Auth::login($admin); 
        return redirect()->route('admin.faqs.index');
    }

    return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
}

    

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login.form');
    }

    
}
