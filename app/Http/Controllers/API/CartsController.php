<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Auth;
use Brian2694\Toastr\Facades\Toastr;

class CartsController extends Controller
{
    
  
    
    
    public function store(Request $request){


        $this->validate($request, [

            'product_id' => 'required'

        ],

        [
            
            'product_id.required' => 'Please give a product'

        ]);


/*
        //match product_id and user
        $cart = Cart::where('product_id', $request->product_id)
        ->Where('user_id', Auth::id())
        ->first();
        //or match ip/product_id
        $cart1 = Cart::where('product_id', $request->product_id)
        ->Where('ip_address', request()->ip())
        ->Where('user_id', Auth::id())
        ->first();*/

        $cart = Cart::where('product_id', $request->product_id)
        ->where('user_id', Auth::id())
        ->where('order_id', NULL)
        ->first();

        if (!is_null($cart)) {

            $cart->increment('product_quantity');
        }else{

                $cart1 = Cart::where('product_id', $request->product_id)
                ->where('ip_address', request()->ip())
                ->where('order_id', NULL)
                ->first();

                if (!is_null($cart1)) {

                     $cart1->increment('product_quantity');
                    
                }else{

                    //add cart product..
                        $cart = new Cart();
                        //if login.
                        if (Auth::check()) {
                            $cart->user_id = Auth::id();
                        }

                        $cart->ip_address = request()->ip();
                        $cart->product_id = $request->product_id;
                        $cart->save();

                    }
            }
       
       return json_encode(['status' => 'success', 'Message' => "Toastr::success('Item add', 'title')", 'totalItems' => Cart::totalItems()]);

   }


    
}
