<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
	public function __construct(){
		$this->middleware(['auth', 'staff']);
	}
    public function index(){
    	$orders = Order::where('status', '!=', 'can')->get();
    	return view('orders.index', compact('orders'));
    }

    public function canceledOrders(){
        $orders = Order::where('status', 'can')->get();
        return view('orders.canceledorders', compact('orders'));
    }

    public function show($id){
    	$order = Order::find($id);
    	return view('orders.show', compact('order'));
    }

    public function status($id, Request $request){
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();

        return back()->with('message', 'Status Updated');
    }
}
