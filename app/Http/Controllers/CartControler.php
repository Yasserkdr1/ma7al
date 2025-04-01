<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use App\Models\Product;

class CartControler extends Controller
{
    public function index(){
        $items=Cart::instance('cart')->content();
        return view('cart',compact('items'));
    }
    public function add_to_cart(Request $request){

        $product = Product::find($request->id);
        if (!$product) {
            return redirect()->back()->withErrors(['error' => 'Produit introuvable']);
        }

        Cart::instance('cart')->add([
        'id' => $product->id,
        'name' => $product->name,
        'qty' => $request->quantity,
        'price' => $product->sale_price,
        'options' => ['image' => $product->image]
         ])->associate('App\Models\Product');




        return redirect()->back();

    }

    public function increase_card_quantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        return redirect()->back();
    }

    public function decrease_card_quantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        return redirect()->back();
    }

    public function remove_item($rowId){

        Cart::instance('cart')->remove($rowId);
        return redirect()->back();

    }

    public function empty_cart()
{
    Cart::instance('cart')->destroy();
    return redirect()->back();
}
}
