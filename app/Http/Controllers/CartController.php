<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function  index()
    {

    }
    public  function addToCart($id,$count,$size){
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            $cart[$id]['count'] = $count;
            $cart[$id]['size'] = $size;
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
        if(Auth::check()){
            $userCart = Auth::user()->carts;
            $existingCartItem = $userCart->where('product', $product->id)->first();
            if ($existingCartItem) {
                // Update the existing cart item if needed
                $existingCartItem->update([
                    'size' => $size,
                    'count' => $count,
                ]);
            } else {
                Auth::user()->carts()->create(
                    [  'product' => $product->id,
                        'name' => $product->name ,
                        'size' => $size,
                        'count' => $count,
                        'imgsrc'=> $product->images()->first()->imgsrc,
                        'price' => $product->price
                    ]
                );
            }
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
            if(Auth::check()){
                $userCart = Auth::user()->carts;
                $existingCartItem = $userCart->where('product', $request->id)->first();
                if ($existingCartItem) {
                    Auth::user()->carts()->where('product', $request->id)->delete();
                }
            }
            return redirect()->back()->with('success');
        }
    }
    public function confirmOrder(Request $request){
        $order = new Order();
        // Assign data from request to the order model properties
        $order->firstName = $request->input('firstName');
        $order->lastName = $request->input('lastName');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->street = $request->input('streetName');
        $order->streetNumber = $request->input('streetNumber');
        $order->town = $request->input('town');
        $order->postalCode = $request->input('postalCode');
        $order->paymentOption = $request->input('paymentOption');
        $order->deliveryOption = $request->input('deliveryOption');
        $order->user_id = Auth::user()->id;
        // If payment option is online payment, save additional payment info
        if ($request->input('paymentOption') === 'onlinePayment') {
            $order->cardNumber = $request->input('cardNumber');
            $order->ExpiryDate = $request->input('expiryDate');
            $order->CVV = $request->input('cvv');
        }

        $order->save();
        //Ulozim session cart items do order items
        if(session('cart') !== null){
            foreach (session('cart') as $id => $item) {
                $order->items()->create(
                    [
                        'product' => $item['id'],
                        'name' => $item['name'] ,
                        'size' => $item['size'],
                        'count' => $item['count'],
                        'imgsrc'=> $item['imgsrc'],
                        'price' => $item['price'],
                        'user_id' => Auth::user()->id,
                        'order_id' => $order->id
                    ]
                );
            }
        }
        //vymazem session a kosik zaznamy
        $userCart = Auth::user()->carts;
        foreach ($userCart as $item) {
            $item->delete();
        }
        session()->put('cart', []);
        //presmerovanie home
        return redirect()->intended('/');
    }
    public function updateQuantity($id, $quantity){
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            $cart[$id]['count'] = $quantity;
            session()->put('cart', $cart);
        }
        if(Auth::check()){
            $userCart = Auth::user()->carts;
            $existingCartItem = $userCart->where('product', $id)->first();
            if ($existingCartItem) {
                $existingCartItem->update([
                    'count' => $quantity,
                ]);
            }
        }
        return redirect()->back()->with('success');
    }
    public function loggedInPrint(){
        $items_string = Auth::user()->cart()->first()->description;
        return redirect()->intended('/get/cartItems');
    }
}

