<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\District;

class DivisionsController extends Controller
{


  public function __construct(){

        $this->middleware('auth:admin');
    }

    
   public function index(){
   	$divisions = Division::orderBy('priority', 'asc')->get();
   	return view('admin.pages.divisions.index', compact('divisions'));
   }


   public function create(){
   
   		return view('admin.pages.divisions.create');
   }

    public function store( Request $request){

    	//Serversite Validation...........

    	 $validatedData = $request->validate([
        'division' => 'required|max:20',
       
   		 ],
   		 [
   		 	'name.required' => 'Brand name must not be Empty!',
   		 	
   		 ]
   		);

	    $division = new Division;
	    $division->name = $request->division;
	    $division->priority = $request->priority;
	    $division->save();

    	\Session::flash('message', 'New Division addded Successfully!!');
   		 return redirect()->route('admin.division.create');
    }


    public function edit($id)
    {
    	$divisions = Division::find($id);
    	return view('admin.pages.divisions.edit', compact('divisions'));
    	
    }


    public function update( Request $request, $id){

    	//Serversite Validation...........

    	 $validatedData = $request->validate([
        'name' => 'required|max:50',
       
        
   		 ],
   		 [
   		 	'name.required' => 'Division name must not be Empty!',
   		 	
   		 ]
   		);

    	$division = Division::find($id);
	    $division->name = $request->name;
	    $division->priority = $request->priority;
	    $division->save();

    	\Session::flash('message', 'Division Updated Successfully!!');
   		 return redirect()->route('admin.division.edit', $division->id);
    } 


     public function delete($id){
    	
    	$division = Division::find($id);

    	//Delete all the districts for this division...
    	$districts = District::where('division_id', $division->id)->get();
    	foreach ($districts as $district ){
    		$district->delete();
    	}

    	$division->delete();
	
    	\Session::flash('message', 'Division Deleted Successfully!!');
   		return redirect()->route('admin.divisions');

    }




}
