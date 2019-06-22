<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Image;

class ProductsController extends Controller
{

    public function __construct(){

        $this->middleware('auth:admin');
    }

    public function index(){

        $products = Product::orderBy('id', 'desc')->get();

        return view('admin.pages.products.index', compact('products'));
    }


     public function create(){

     	return view('admin.pages.products.create');

    }

    public function store( Request $request){

    	//Serversite Validation...........

    	 $validatedData = $request->validate([
        'title' => 'required|max:150',
        'description' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric',
        'category_id' => 'required',
        'brand_id' => 'required',

    ]);


    $product = new Product;
    $product->title = $request->title;
    $product->description = $request->description;
    $product->quantity = $request->quantity;
    $product->price = $request->price;

    $product->slug = str_slug($product->title);
    $product->category_id = $request->category_id;
    $product->brand_id = $request->brand_id;
    $product->admin_id = 1;
    $product->save();

    //ProductImage Model insert image...
/*
    if ($request->hasFile('product_image')) {
    	//insert that image...
    	$image = $request->file('product_image'); //get file
    	$img = time(). '.' .$image->getClientOriginalExtension(); //get name
    	$location = public_path('images/products/'. $img); //declare path
    	Image::make($image)->save($location); //save to path

    	$product_image = new ProductImage;
    	$product_image->product_id = $product->id;
    	$product_image->image = $img;
    	$product_image->save();

    }

*/
    //muti-image insert..

    if (count($request->product_image) > 0) {

    	foreach ($request->product_image as $image) {

    	//$image = $request->file('product_image'); //get file
    	$img = time(). '.' .$image->getClientOriginalExtension(); //get name
    	$location = public_path('images/products/'. $img); //declare path
    	Image::make($image)->save($location); //save to path -- Use "http://image.intervention.io/getting_started/installation"

    	$product_image               = new ProductImage;
    	$product_image->product_id   = $product->id;
    	$product_image->image        = $img;
    	$product_image->save();



    	}
    }
    	   \Session::flash('message', 'New product addded Successfully!!');

   		 return redirect()->route('admin.product.create');
    }


    public function edit($id){

    	$products = Product::find($id);
     	return view('admin.pages.products.edit',compact('products'));
    }

     public function update( Request $request, $id){
    	//Serversite Validation...........

    	 $validatedData = $request->validate([

        'title'             => 'required|max:150',
        'description'       => 'required',
        'price'             => 'required|numeric',
        'quantity'          => 'required|numeric',
        'category_id'       => 'required',
        'brand_id'          => 'required',
    ]);


   	$product = Product::find($id);
    $product->title         = $request->title;
    $product->description   = $request->description;
    $product->quantity      = $request->quantity;
    $product->price         = $request->price;
    $product->slug          = str_slug($product->title);
    $product->category_id   = $request->category_id;
    $product->brand_id      = $request->brand_id;
    $product->save();

   \Session::flash('message', 'Product details updated Successfully!!');
   	return redirect()->route('admin.product.edit',$product->id);
    }



    public function delete($id){

    	$product = Product::find($id);
    	$product->delete();

        //delete images from product image...

        foreach ($product->images as $img) {
            //delete file from folder.

            $file_name = $img->image;

            if (file_exists("images/products".$file_name)) {
                unlink("images/products".$file_name);
            }
           $img->delete();
        }

    	\Session::flash('message', 'Product Deleted Successfully!!');
   		return redirect()->route('admin.products');


    }

   

}
