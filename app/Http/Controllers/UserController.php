<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderItem;
use App\Models\Transaction;



class UserController extends Controller
{
    public function index()
    {
        return view('user.indexx');
    }

    public function orders()
{
$orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(10);
return view('user.orders',compact('orders'));
}

public function order_details($order_id)
{
        $order = Order::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(100);       
        $orderItems = OrderItem::where('order_id',$order_id)->orderBy('id')->paginate(12);
        $transaction = Transaction::where('order_id',$order_id)->first();
        return view('user.order-details',compact('order','orderItems','transaction'));
}
}
