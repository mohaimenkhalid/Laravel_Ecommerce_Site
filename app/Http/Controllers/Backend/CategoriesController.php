<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductImage;
use Image;
use File;

class CategoriesController extends Controller
{
  

  public function __construct(){

        $this->middleware('auth:admin');
    }
    
    public function index()
    {

    	$categories = Category::orderBy('id', 'desc')->get();
    	return view('admin.pages.categories.index', compact('categories'));
    }
    

     public function create(){

     	$main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
    	
     	return view('admin.pages.categories.create', compact('main_categories'));
    	
    }

    public function store( Request $request){

    	//Serversite Validation...........

    	 $validatedData = $request->validate([
        'name' => 'required|max:20',
        'image' =>'nullable ',
        
   		 ],
   		 [
   		 	'name.required' => 'Category name must not be Empty!',
   		 	'image.image' => 'Invalid image formate.valid formte Ex-(.jpg, .jpeg, .png, .gif..)'
   		 ]
   		);


	    $category = new Category;
	    $category->name = $request->name;
	    $category->description = $request->description;
	    $category->parent_id = $request->parent_id;
	    $category->save();

	    //ProductImage Model insert image...

	    if ($request->hasFile('image')) {
	    	//insert that image...
	    	$image = $request->file('image'); //get file
	    	$img = time(). '.' .$image->getClientOriginalExtension(); //get name
	    	$location = public_path('images/categories/'. $img); //declare path
	    	Image::make($image)->save($location); //save to path


	    $category->image = $img;
	    $category->save();

	   		 }

    	\Session::flash('message', 'New Category addded Successfully!!');
   		 return redirect()->route('admin.category.create');
    }

    public function edit($id)
    {
    	$categories = Category::find($id);
    	$main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
    	return view('admin.pages.categories.edit', compact('categories', 'main_categories'));
    	
    }



    public function update( Request $request, $id){

    	//Serversite Validation...........

    	 $validatedData = $request->validate([
        'name' => 'required|max:50',
        'image' =>'nullable ',
        
   		 ],
   		 [
   		 	'name.required' => 'Category name must not be Empty!',
   		 	'image.image' => 'Invalid image formate.valid formte Ex-(.jpg, .jpeg, .png, .gif..)'
   		 ]
   		);

    	$category = Category::find($id);
	    $category->name = $request->name;
	    $category->description = $request->description;
	    $category->parent_id = $request->parent_id;
	   

	    //ProductImage Model insert image...

	    if ($request->hasFile('image')) 
	    {
	    	//delete old image from folder
	    	if (File::exists('images/categories/'.$category->image))
	    	{
		   		File::delete('images/categories/'.$category->image);
			} 
			  //insert that image...
				    $image = $request->file('image'); //get file
				    $img = time(). '.' .$image->getClientOriginalExtension(); //get name
				    $location = public_path('images/categories/'. $img); //declare path
				    Image::make($image)->save($location); //save to path


				    $category->image = $img;
				    $category->save();

				    \Session::flash('message', 'Category updated Successfully!!');
			   		 return redirect()->route('admin.category.edit',$category->id);

				   
	   	}else{
	   		 	 $category->save();

	   		 	 \Session::flash('message', 'Category updated Successfully!!');
			   		return redirect()->route('admin.category.edit',$category->id);

	   		 }
    } 


     public function delete($id){
    	
    	$category = Category::find($id);

    	
    		//If it is primary category then delete all its child/sub category..
    		if ($category->parent_id == NULL) {
		    			//Delete sub category...
		    		$sub_categories = Category::orderBy('name', 'desc')->where('parent_id', $category->id)->get();


		    		foreach ($sub_categories as $sub) {

		    		//delete sub category image
			    	if (File::exists('images/categories/'.$sub->image))
			    	{
				   		File::delete('images/categories/'.$sub->image);
					} 
		    			
		    			$sub->delete();
		    		}

    		}
    		
    	//delete category image...
	    	if (File::exists('images/categories/'.$category->image))
	    	{
		   		File::delete('images/categories/'.$category->image);
			} 

    	$category->delete();
    		
    		
    	\Session::flash('message', 'Category Deleted Successfully!!');
   		return redirect()->route('admin.categories');

   	


    }






}
