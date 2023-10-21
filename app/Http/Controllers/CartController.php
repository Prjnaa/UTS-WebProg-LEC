<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

        $menuInfo = [
            'item_name' => $menu->menu_name,
            'item_cat' => $menu->menu_cat,
            'item_price' => $menu->price,
            'item_desc' => $menu->menu_desc,
            'item_img' => $menu->menu_img_path,
        ];

        Session::put('menuInfo', $menuInfo);

        return redirect()->back()->with('success', 'Item added to cart successfully.');
    }

    public function showCart()
    {
        $cart = Cart::with('cartItems.menu')->where('user_id', auth()->user()->id)->first();

        $cartItems = $cart->cartItems->map(function ($item) {
            return [
                'item_name' => $item->menu->menu_name,
                'item_cat' => $item->menu->menu_cat,
                'item_price' => $item->menu->price,
                'item_desc' => $item->menu->menu_desc,
                'item_img' => $item->menu->menu_img_path,
                'qty' => $item->qty,
            ];
        });

        return view('cart', compact('cartItems'));
    }
}
