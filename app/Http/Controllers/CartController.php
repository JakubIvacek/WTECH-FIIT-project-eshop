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
        $rules = [
            'phone' => 'required|string|max:13',
            'paymentOption' => 'required|in:cashOnDelivery,onlinePayment',
            'deliveryOption' => 'required|in:packeta,courier',
        ];

        // If user is not authenticated, additional validation rules for guest checkout
        if (!Auth::check()) {
            $rules += [
                'email' => 'required|email',
                'firstName' => 'required|string|max:50',
                'lastName' => 'required|string|max:50',
                'streetName' => 'required|string|max:50',
                'streetNumber' => 'required|string|max:50',
                'town' => 'required|string|max:50',
                'postalCode' => 'required|string|max:20',
            ];
        }
        if ($request->input('paymentOption') === 'onlinePayment') {
            $rules += [
                'cardNumber' => 'required|numeric|digits_between:12,19',
                'expiryDate' => 'required|date_format:m/y',
                'cvv' => 'required|numeric|digits:3',
            ];
        }
        $validatedData = $request->validate($rules);

        $order = new Order();
        $order->phone = $validatedData['phone'];
        $order->paymentOption = $validatedData['paymentOption'];
        $order->deliveryOption = $validatedData['deliveryOption'];

        if (!Auth::check()){
            $order->email = $validatedData['email'];
            $order->firstName = $validatedData['firstName'];
            $order->lastName = $validatedData['lastName'];
            $order->street = $validatedData['streetName'];
            $order->streetNumber = $validatedData['streetNumber'];
            $order->town = $validatedData['town'];
            $order->postalCode = $validatedData['postalCode'];
        }else{
            $order->email = Auth::user()->email;
            $order->firstName = Auth::user()->name;
            $order->lastName = Auth::user()->surname;
            $order->street = Auth::user()->street_name;
            $order->streetNumber = Auth::user()->street_number;
            $order->town = Auth::user()->town;
            $order->postalCode = Auth::user()->postal_code;
        }

        if (Auth::check()) {
            $order->user_id = Auth::user()->id;
        } else {
            $order->user_id = null; // Set user_id to null for guest users
        }
        // If payment option is online payment, save additional payment info
        if ($validatedData['paymentOption'] === 'onlinePayment') {
            $order->cardNumber = $validatedData['cardNumber'];
            $order->ExpiryDate = $validatedData['expiryDate'];
            $order->CVV = $validatedData['cvv'];
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
                        'user_id' => (Auth::check()) ? Auth::user()->id : null,
                        'order_id' => $order->id
                    ]
                );
                $size = $item['size'];
                $product = Product::findOrFail($item['id']); // Assuming there's a Product model
                $productSize = $product->sizes()->where('size', $size)->first();
                if ($productSize) {
                    $productSize->count -= $item['count'];
                    $productSize->save();
                }
            }
        }
        //vymazem session a kosik zaznamy
        if(Auth::user()){
            $userCart = Auth::user()->carts;
            foreach ($userCart as $item) {
                $item->delete();
            }
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

