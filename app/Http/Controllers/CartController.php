<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function  index()
    {

    }
    public  function addToCart($id,$count,$size){
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            $cart[$id]['count'] += $count;
        }else{
            $cart[$id] = [
                "id" => $product->id,
                "count" => $count,
                "name" => $product->name,
                "size" => $size,
                "imgsrc" => $product->images()->first()->imgsrc,
                "price" => $product->price
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success');
    }

    public function deleteProduct(Request $request){
        if($request->id){
            $cart = session()->get('cart', []);
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success');
        }
    }
    public function updateQuantity($id, $quantity){
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            $cart[$id]['count'] = $quantity;
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success');
    }
}

