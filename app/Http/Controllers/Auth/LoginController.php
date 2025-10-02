<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;
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

    

    /**
     * Where to redirect users after login.
     *
     * @var string
     */


    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function Login(){

        return view('auth.login');
    }
    public function login_post(Request $request)
    {
  if ($request->email != "" && $request->password != "") {


            $user = User::where("email", $request->email)
                ->where("is_Active", 1)
                ->first();


            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    
                    Session::put('user_id', $user->id);

                    return redirect()->route('dashboard.index');
                } else {
                    return Redirect::back()->withErrors(['msg' => 'Login failed, incorrect password!']);
                }
            } else {
                return Redirect::back()->withErrors(['msg' => 'Login failed, user not found or not an admin!']);
            }
        } else {
            return Redirect::back()->withErrors(['msg' => 'Please enter email and password!']);
        }
             
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
