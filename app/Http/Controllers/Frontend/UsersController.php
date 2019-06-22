<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\District;
use App\Models\Division;
use App\User;
use Auth;

class UsersController extends Controller
{

	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){

        $this->middleware('auth');
    }


    public function dashboard(){

    	$user = Auth::user();
    	return view('frontend.pages.users.dashboard', compact('user'));
    }


    public function profile(){

    	$user = Auth::user();
    	$divisions = Division::orderBy('priority', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();

    	return view('frontend.pages.users.profile', compact('user', 'divisions', 'districts'));
    	
    }


    public function profileupdate( Request $request){

    	//Serversite Validation...........

        $user = Auth::user();

    	$validatedData = $request->validate([

         	'first_name' => ['required', 'string', 'max:30'],
            'last_name' => ['nullable', 'string', 'max:30'],
            'usarname' => ['string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email,'. $user->id ],
            'division_id' => ['required', 'numeric'],
            'district_id' => ['required', 'numeric'],
            'phone_no' => ['required', 'max:15'],
            'street_address' => ['required', 'max:100'],
    	]);


   			$user 					= Auth::user();
    		$user->first_name 		= $request->first_name;
    		$user->last_name 		= $request->last_name;
    		$user->username 		= $request->username;
    		$user->email 			= $request->email;
    		$user->division_id 		= $request->division_id;
    		$user->district_id 		= $request->district_id;
    		$user->phone_no 		= $request->phone_no;
    		$user->street_address	= $request->street_address;
    		$user->shipping_address	= $request->shipping_address;
    		$user->ip_address 		= request()->ip();
    		if ($request->password != NULL || $request->password != "") {
        		$user->password     = Hash::make($request->password);
    			}
   			$user->save();

   \Session::flash('message', 'Profile updated Successfully!!');
   	return redirect()->route('user.profile');
    }





}
