<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Redirect;
use Session;

class CustomerLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.customer-login');
    }

    protected function login(Request $request)
    { 
    if ($request->email != "" && $request->password != "") {

        $user = DB::table("users")
            ->where("email", $request->email)
            ->where("is_Active", '0') 
            ->first(); 
// dd($user);
        if ($user) {
            if (md5($request->password) == $user->password) {
                
                Session::flash('message', 'Welcome to Smira Club.');
                Session::put('user_id', $user->user_id); 
                
                \Log::info('User logged in, redirecting to dashboard');

                if ($user->type == 'customer') {
                   return redirect()->intended('/');  
                } elseif ($user->type == 'customer') {
                    return redirect()->route('customer.dashboard'); 
                } else {
                    return Redirect::back()->withErrors(['msg' => 'User type not recognized!']);
                }

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
}
