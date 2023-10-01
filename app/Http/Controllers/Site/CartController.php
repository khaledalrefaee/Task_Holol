<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\Order_item;
class CartController extends Controller
{


    public function ProductCart()
    {
        return view('cart');
    }

    public function addProducttoCart($id)
    {
        $book = Product::findOrFail($id);
        $image = $book->images->first(); 
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $book->id, 
                "name" => $book->name,
                "quantity" => isset($book->qty) ? $book->qty : 1,
                "selling_price" => $book->selling_price,
                "image" => isset($image) ? $image->filename : null,


            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product has been added to cart!');

    }

     public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Book added to cart.');
        }
    }

    public function deleteProduct(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Book successfully deleted.');
        }
    }


    public function checkout()
    {
        return view('checkout');
    }

    public function confirm(Request $request)
    {   
        $order = new Order();
        $order ->user_id = auth()->user()->id;
        $order->order_number =mt_rand(100000, 999999); 
        $order->total_price = 0; 
        $order->name = $request->name; 
        $order->address = $request->address; 
        $order->status ='pending';
        $order->save();
        
        // إضافة عناصر الطلب للطلب الجديد
        $cart = session('cart') ?? [];
        foreach ($cart as $id => $details) {
            $orderItem = new Order_item();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $id;
            $orderItem->quantity = $details['quantity'];
            $orderItem->price = $details['selling_price'];
            $orderItem->save();
            
            // تحديث المجموع الإجمالي للطلب
            $order->total_price += $details['quantity'] * $details['selling_price'];
        }
        
        $order->save();
        
        session()->forget('cart');
  
        return redirect()->route('home')->with('success', 'Order has been placed successfully.');
    }
}
