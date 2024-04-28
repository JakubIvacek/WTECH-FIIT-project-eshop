<?php
// app/Http/Controllers/LoginController.php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
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
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admin');
            } else {
                $userCart = Auth::user()->carts;
                $user = Auth::user();
                $cart = session()->get('cart', []);
                $content = "";
                if(session('cart') !== null){
                    foreach (session('cart') as $id => $item) {
                        $existingCartItem = $userCart->where('product', ((string) $item['id']))->first();
                        if ($existingCartItem) {
                            // Update the existing cart item if needed
                            $existingCartItem->update([
                                'size' => $item['size'],
                                'count' => $item['count'],
                            ]);
                        } else {
                            Auth::user()->carts()->create(
                                [  'product' => $item['id'],
                                    'name' => $item['name'] ,
                                    'size' => $item['size'],
                                    'count' => $item['count'],
                                    'imgsrc'=> $item['imgsrc'],
                                    'price' => $item['price']]
                            );
                        }
                }
                }
                $user->save();

                $userCart = Auth::user()->carts;
                foreach ($userCart as $item) {
                    $cart[((integer) $item->product)] = [
                        "id" => $item->product,
                        "count" => $item->count,
                        "name" => $item->name,
                        "size" => $item->size,
                        "imgsrc" => $item->imgsrc,
                        "price" => $item->price
                    ];
                }
                session()->put('cart', $cart);
                return redirect()->intended('/profile');
            }
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    // LOGOUT USER
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
