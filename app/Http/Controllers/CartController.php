<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function listCart() {

        $cart = session()->get('cart',[]);
        $total = 0;
        $subTotal = 0;
        foreach ($cart as $item) {
            $subTotal +=  $item['price'] * $item['quantity'];
        }
        $shipping = 30;
        $total = $subTotal + $shipping;
      
        return view('clients.cart',compact('cart','subTotal','total','shipping'));
    }

    public function addCart(Request $request) 
    {
        
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        // dd($request->all());
        $product = Product::query()->findOrFail($productId );

        $cart = session()->get('cart',[]);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        }else {
            $cart[$productId] = [
                'name' => $product->name,
                'quantity' => $quantity,
                'price' => $product->price,
                'image' => $product->image,
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
        $cartNew = $request->input('cart',[]);
        session()->put('cart',$cartNew);
        return redirect()->back();
    }


}
