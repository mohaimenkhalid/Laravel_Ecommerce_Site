<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Notifications\VerifyRegistration;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }


     public function login(Request $request)
    {
   
          $request->validate([
            'email' => 'required|string',
             'password' => 'required',
        ]);


         //Find user By this Email...

         $user = User::where('email', $request->email)->first();

         //If user not find
         if (is_null($user)) {

            \Session::flash('error', 'Email does not found in Database.Please register first');
            return redirect()->route('login');
            
         }
         
         //If find user and status = 1 (active)
         elseif ($user->status == 1) {
             //login this User... email and passwd mached..
            if (Auth::guard('web')->attempt(['email' => $request->email, 'password'=>$request->password], $request->remember)) {
                //Login Now
                return redirect()->intended(route('index'));
                
                } else{
                //if passwd don't match

                    \Session::flash('error', 'Incorrect password');
                    return redirect()->route('login');
                }

    
         }else{

            //send him a token---register user but not active account

            if (!is_null($user)) {
                
                 $user->notify(new VerifyRegistration($user, $user->remember_token));

                \Session::flash('message', 'Your account not activeted yet.A new confirmation mail has Send to your email.Please check and confirm your email.');
                return redirect()->route('register');
            }else{

                 \Session::flash('error', 'Please login first.');
                return redirect()->route('login');
            }

         }

         
    }

}
