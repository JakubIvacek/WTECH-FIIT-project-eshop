<?php
// app/Http/Controllers/LoginController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //Go to login or if user already logged in into profile
    public function create()
    {
        if(Auth::check() and Auth::user()->role === 'user') {
            return view('profile');
        }
        else return view('login');
    }

    // Log in user to profile or if admin to admin panel
    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if(Auth::user()->role === 'admin'){
                return redirect()->intended('/admin');
            }else
            return redirect()->intended('/profile');
        }
        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    // LOGOUT USER
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
