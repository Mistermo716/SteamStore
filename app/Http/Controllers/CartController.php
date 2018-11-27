<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Game;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = Cart::make();

        return view('cart', compact('cart'));
    }

    public function add(Game $game)
    {
        Cart::make()
            ->add($game)
            ->save();

        return redirect()->route('cart');
    }
}
