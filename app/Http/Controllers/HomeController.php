<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(Request $request)
    {


        return view('home');
    }
    public function closeup(Request $request, $productName)
    {
        $product = Product::where('name', $productName)->first();

        if ($product) {
            $productId = $product->id;
            $redirectUrl = '/products/' . $productId;
            return "<script>window.location.href = '{$redirectUrl}';</script>";
        }
        return redirect()->back();
    }

}
