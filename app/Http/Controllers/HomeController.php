<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //redirect from login and registration page after login user****
    public function index()
    {
       $featured_products = Product::orderBy('title', 'DESC')->where('status', 1)->get();
        $new_products = Product::orderBy('id', 'DESC')->take(6)->get();

        return view('frontend.pages.index', compact('featured_products', 'new_products'));
    }
}
