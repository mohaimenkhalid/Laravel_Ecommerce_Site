<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;

class DistrictsController extends Controller
{


    public function __construct(){

        $this->middleware('auth:admin');
    }
    
    public function index(){

   	$districts = District::orderBy('name', 'asc')->get();
   	return view('admin.pages.districts.index', compact('districts'));
   }

   public function create(){

   		$divisions = Division::orderBy('priority')->get();
   
   		return view('admin.pages.districts.create', compact('divisions'));
   }


   public function store( Request $request){

    	//Serversite Validation...........

    	 $validatedData = $request->validate([
        'name' => 'required|max:20',
        'division_id' => 'required ' ,
   		 ],
   		 [
   		 	'name.required' => 'District name must not be Empty!',
   		 	'division_id.required' => 'Please provide a division for districts!',
   		 	
   		 ]
   		);

	    $district = new District;
	    $district->name = $request->name;
	    $district->division_id = $request->division_id;
	    $district->save();

    	\Session::flash('message', 'A new District addded Successfully!!');
   		 return redirect()->route('admin.district.create');
    }


    public function edit($id)
    {
    	$districts = District::find($id);
    	return view('admin.pages.districts.edit', compact('districts'));
    	
    }


    public function update( Request $request, $id){

    	//Serversite Validation...........

    	 $validatedData = $request->validate([
        'name' => 'required|max:50',
        'division_id' => 'required ' ,
       
        
   		 ],
   		 [
   		 	'name.required' => 'Division name must not be Empty!',
   		 	'division_id.required' => 'Please provide a division for districts!',   		 	
   		 ]
   		);

    	$district = District::find($id);
	    $district->name = $request->name;
	    $district->division_id = $request->division_id;
	    $district->save();

    	\Session::flash('message', 'District Updated Successfully!!');
   		 return redirect()->route('admin.district.edit', $district->id);
    } 


     public function delete($id){
    	
    	$district = District::find($id);

    	$district->delete();
	
    	\Session::flash('message', 'District Deleted Successfully!!');
   		return redirect()->route('admin.districts');

    }




}
