<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Auth;

class CartsController extends Controller
{
    
    public function index(){



        return view('frontend.pages.carts');
        
    }

    
    
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
        session()->flash('message', 'Product has added to Cart!!');
        return back();


   }


   public function update( Request $request, $id){
       
       $cart = Cart::find($id);

       if (!is_null($cart)) {
           $cart->product_quantity = $request->product_quantity;
           $cart->save();

           session()->flash('message', 'Cart Item Updated successfully!!');
            return back();
       }else{

        session()->flash('error', 'Something is going wrong.');
        return redirect()->route('carts');
       }
   }


    public function destroy($id){
       $cart = Cart::find($id);
       $cart->delete(); 
        session()->flash('message', 'Cart Item Deleted successfully!!');
        return back();
       
       }
   
   
    

    
}
