<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Cart;
use Auth;


class CheckoutsController extends Controller
{
    public function index(){

    	$payments = Payment::orderBy('priority', 'asc')->get();
    	
    	return view('frontend.pages.checkouts', compact('payments'));
    }

    public function store(Request $request){

    	$this->validate($request, [

    		'name'=> 'required',
    		'email'=> 'required',
    		'phone_no'=> 'required',
    		'shipping_address'=> 'required',
    		'payment_method_id'=> 'required',
  
    	]);

    	$order = new Order();

    	//Transsaction Id has given or not

    	if ($request->payment_method_id != 'Cash_in') {
    		if ($request->transaction_id == NULL ||  empty($request->transaction_id)) {
    			session()->flash('error', 'Please give your Transaction Id');
    			return back();
    		}
    	}

		    	$order->name = $request->name;
		    	$order->email = $request->email;
		    	$order->phone_no = $request->phone_no;
		    	$order->shipping_address = $request->shipping_address;
		    	$order->transaction_id = $request->transaction_id;
		    	$order->ip_address = request()->ip();
		    	$order->message = $request->message;

		    	if (Auth::check()) {
		    		$order->user_id = Auth::id();
		    	}

		    	$order->payment_id = Payment::where('short_name', $request->payment_method_id)->first()->id;
		    	$order->save();

		    	foreach (Cart::totalcarts() as $cart) {
		    		$cart->order_id = $order->id;
		    		$cart->save();	
		    	}

		    	session()->flash('message', 'Your Order has taken Successfully !! please wait admin will confirm it ');
		    	return redirect()->route('index');
    }

}
