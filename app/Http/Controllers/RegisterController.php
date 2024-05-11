<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function create()
    {
        return view('signup');
    }
    // Register user and redirect go login
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:13',
            'street' => 'required|string|max:50',
            'street_num' => 'required|string|max:50',
            'town' => 'required|string|max:50',
            'postalCode' => 'required|string|max:20',
        ]);
        //dd($request->all());
        $input = $request->all();
        $user = new User();
        $user->name = $input['name'];
        $user->surname = $input['surname'];
        $user->email = $input['email'];
        $user->phone = $input['phone'];
        $user->password = Hash::make($input['password']);
        $user->street_name = $input['street'];
        $user->street_number = $input['street_num'];
        $user->town = $input['town'];
        $user->postal_code = $input['postalCode'];
        $user->role = 'user';
        $user->created_at = now();
        $user->edited_at = now();
        $user->save();
        return redirect('/login');

    }
}
