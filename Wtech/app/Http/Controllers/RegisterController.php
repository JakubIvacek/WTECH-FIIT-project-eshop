<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('signup');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        User::create([
            'name' => $input['name'],
            'surname' => $input['surname'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
            'role' => 'user',
            'created_at' => now(),
            'edited_at' => now(),
        ]);
        return redirect('/login');

    }
}
