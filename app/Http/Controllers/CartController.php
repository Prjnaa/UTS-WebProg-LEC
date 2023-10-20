<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;


class CartController extends Controller
{
    
    public function addToCart(Request $request, Menu $menu)
{
    $cart = Cart::firstOrCreate(['user_id' => auth()->user()->id]);


    $existingCartItem = $cart->cartItems()->where('menu_id', $menu->id)->first();

    if ($existingCartItem) {
        $existingCartItem->increment('qty');
    } else {
        $cart->cartItems()->create([
            'menu_id' => $menu->id,
            'qty' => 1,
        ]);
    }

    return redirect()->back()->with('success', 'Item added to cart successfully.');
}
}

