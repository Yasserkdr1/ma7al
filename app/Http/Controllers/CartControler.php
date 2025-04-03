<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

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

    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $adresse = Address::where('user_id', Auth::user()->id)->where('isdefault', 1)->first();

        return view('checkout', compact('adresse'));
    }

    public function place_order(Request $request)
    {
        $user_id = Auth::user()->id;
        $address = Address::where('user_id', $user_id)->where('isdefault', true)->first();

        if (!$address) {
            $request->validate([
                'name' => 'required|max:100',
                'phone' => 'required|numeric|digits:15',
                'zip' => 'required|numeric|digits:6',
                'state' => 'required',
                'city' => 'required',
                'address' => 'required',
                'locality' => 'required',
                'landmark' => 'required',
            ]);
            $address = new Address();
            $address->name = $request->name;
            $address->phone = $request->phone;
            $address->zip = $request->zip;
            $address->state = $request->state;
            $address->city = $request->city;
            $address->address = $request->address;
            $address->locality = $request->locality;
            $address->landmark = $request->landmark;
            $address->country = '';
            $address->user_id = $user_id;
            $address->isdefault = true;
            $address->save();

        }

        $this->setAmountforCheckout();


        $order=new Order();
        $order->user_id = $user_id;
        $order->Subtotal = Session::get('checkout')['Subtotal'];
        $order->shipping = Session::get('checkout')['shipping'];
        $order->tax = Session::get('checkout')['tax'];
        $order->total = Session::get('checkout')['total'];
        $order->name= $address->name;
        $order->phone= $address->phone;
        $order->zip= $address->zip;
        $order->state= $address->state;
        $order->city= $address->city;
        $order->address= $address->address;
        $order->locality= $address->locality;
        $order->landmark= $address->landmark;
        $order->country= $address->country;
        $order->zip = $address->zip;
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem= new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->quantity = $item->qty;
            $orderItem->price = $item->price;
            $orderItem->save();
        }
        if($request->payment_method == 'card'){
            //
        }

        elseif($request->payment_method == 'paypal'){
            //
        }

        elseif($request->mode == 'cod'){
            $transaction = new Transaction();
            $transaction->user_id = $user_id;
            $transaction->order_id = $order->id;    
            $transaction->mode=$request->payment_method;
            $transaction->status='pending';
            $transaction->save();
        }
        


        Cart::instance('cart')->destroy();
        Session::forget('checkout');
        Session::put('order_id', $order->id);
        return redirect()->route('cart.order.confirmation');
        

        
        Cart::instance('cart')->destroy();

        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }
    public function setAmountforCheckout(){
        if (!Cart::instance('cart')->content()->count() > 0) {
            Session::forget('checkout');
            return;
        }
        else{
            $total = Cart::instance('cart')->total();
            $shipping = 0;
            $tax = 0;
            $Subtotal = $total + $shipping + $tax;
            Session::put('checkout', [
                'total' => $total,
                'shipping' => $shipping,
                'tax' => $tax,
                'Subtotal' => $Subtotal,
            ]);
        }
    }


    public function order_confirmation()
    {
        if (Session::has('order_id')) {
            return view('order-confirmation', compact('order'));
        }
        return redirect()->route('cart.indexx');
    }



}
