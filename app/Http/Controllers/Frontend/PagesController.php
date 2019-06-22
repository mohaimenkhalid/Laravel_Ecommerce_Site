<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;


class PagesController extends Controller
{
        
    public function index(){

    	$featured_products = Product::orderBy('title', 'DESC')->where('status', 1)->get();
    	$new_products = Product::orderBy('id', 'DESC')->take(6)->get();

    	return view('frontend.pages.index', compact('featured_products', 'new_products'));
    }

    public function search(Request $request){

    	$search = $request->search;

    	$products = Product::orWhere('title', 'like', '%'.$search.'%')
    	->orWhere('description', 'like', '%'.$search.'%')
    	->orWhere('slug', 'like', '%'.$search.'%')
    	->orWhere('price', 'like', '%'.$search.'%')
    	->orWhere('quantity', 'like', '%'.$search.'%')
    	->orderBy('id', 'desc')->paginate(12);
    	return view('frontend.pages.product.search', compact('products', 'search') );

    }

    	
}
