<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Admin panel return products
    public function index(Request $request)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $query = Product::query();
            $products = $query->paginate(15);

            return view('admin', ['products' => $products]);
        } else {
            return redirect()->route('home');
        }

    }
}
