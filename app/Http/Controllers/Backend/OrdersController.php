<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
    {
    	$orders= Order::orderBy('id', 'desc')->get();
    	return view('admin.pages.orders.index', compact('orders'));
    }

    public function show($id)
    {
    	$order = Order::find($id);
    	$order->is_seen_by_admin = 1;
    	$order->save();
    	return view('admin.pages.orders.show', compact('order'));
    }



     public function paid($id)
    {

    	$order = Order::find($id);

    	if ($order->is_paid == 1) {

    		$order->is_paid = 0;
    		$order->save();
    		
    	}else{

    		$order->is_paid = 1;
    		$order->save();
    	}

    	//session()->flash('message', 'Order Paid status changed By Admin');
    	return back();
    	
    }

     public function completed($id)
    {

    	$order = Order::find($id);

    	if ($order->is_completed == 1) {

    		$order->is_completed = 0;
    		$order->save();
    		
    	}else{

    		$order->is_completed = 1;
    		$order->save();
    	}

    	//session()->flash('message', 'Order Completed status changed By Admin');
    	return back();
    	
    }

    
}
