<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class CartControler extends Controller
{
    public function index(){
        $items=Cart::instance('cart')->content();
        return view('cart',compact('items'));
    }
    
}
