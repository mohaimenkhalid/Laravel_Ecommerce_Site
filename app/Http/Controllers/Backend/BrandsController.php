<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\BrandImage;
use Image;
use File;

class BrandsController extends Controller
{


  public function __construct(){

        $this->middleware('auth:admin');
    }
    
    public function index()
    {

    	$brands = Brand::orderBy('id', 'desc')->get();
    	return view('admin.pages.brands.index', compact('brands') );
    }


     public function create(){

     	
     	return view('admin.pages.brands.create');
    	
    }

    public function store( Request $request){

    	//Serversite Validation...........

    	 $validatedData = $request->validate([
        'name' => 'required|max:20',
        'image' =>'nullable ',
        
   		 ],
   		 [
   		 	'name.required' => 'Brand name must not be Empty!',
   		 	'image.image' => 'Invalid image formate.valid formte Ex-(.jpg, .jpeg, .png, .gif..)'
   		 ]
   		);


	    $brand = new Brand;
	    $brand->name = $request->name;
	    $brand->description = $request->description;
	    $brand->save();

	    //ProductImage Model insert image...

	    if ($request->hasFile('image')) {
	    	//insert that image...
	    	$image = $request->file('image'); //get file
	    	$img = time(). '.' .$image->getClientOriginalExtension(); //get name
	    	$location = public_path('images/brands/'. $img); //declare path
	    	Image::make($image)->save($location); //save to path


	    $brand->image = $img;
	    $brand->save();

	   		 }

    	\Session::flash('message', 'New Brand addded Successfully!!');
   		 return redirect()->route('admin.brand.create');
    }

    public function edit($id)
    {
    	$brands = Brand::find($id);
    	return view('admin.pages.brands.edit', compact('brands'));
    	
    }



    public function update( Request $request, $id){

    	//Serversite Validation...........

    	 $validatedData = $request->validate([
        'name' => 'required|max:50',
        'image' =>'nullable ',
        
   		 ],
   		 [
   		 	'name.required' => 'Brand name must not be Empty!',
   		 	'image.image' => 'Invalid image formate.valid formte Ex-(.jpg, .jpeg, .png, .gif..)'
   		 ]
   		);

    	$brand = Brand::find($id);
	    $brand->name = $request->name;
	    $brand->description = $request->description;
	   
	    //ProductImage Model insert image...

	    if ($request->hasFile('image')) 
	    {

	    	//delete brand image...
	    	if (File::exists('images/brands/'.$brand->image))
	    	{
		   		File::delete('images/brands/'.$brand->image);
			} 

			  //insert that image...
				    $image = $request->file('image'); //get file
				    $img = time(). '.' .$image->getClientOriginalExtension(); //get name
				    $location = public_path('images/brands/'. $img); //declare path
				    Image::make($image)->save($location); //save to path


				    $brand->image = $img;
				    $brand->save();

				    \Session::flash('message', 'Brand updated Successfully!!');
			   		 return redirect()->route('admin.brand.edit',$brand->id);

				   
	   	}else{
	   		 	 $brand->save();

	   		 	 \Session::flash('message', 'Brand updated Successfully!!');
			   		return redirect()->route('admin.brand.edit',$brand->id);

	   		 }
    } 


     public function delete($id){
    	
    	$brand = Brand::find($id);
    		
    	//delete brand image...
	    	if (File::exists('images/brands/'.$brand->image))
	    	{
		   		File::delete('images/brands/'.$brand->image);
			} 

    	$brand->delete();
    		
    		
    	\Session::flash('message', 'Brand Deleted Successfully!!');
   		return redirect()->route('admin.brands');

    }


}
