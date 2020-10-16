<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\User;

class HomeController extends Controller {

    public function showLogin() {
        // show the form
        return redirect()->route('welcome');
    }

    public function doLogin(Request $request) {
        //remove any white spaces in the user_code
        //remove spaces from incoming user_code
       $incoming_user_code = str_replace(' ', '', $request->user_code);
       $request->merge(['user_code'=>$incoming_user_code]);
       if (User::where('user_code', '=', $request->user_code)->count() > 0) { //is the user_code already registered?
            $user = User::where('user_code', '=', $request->user_code)->first();  //retrieve the record related to the user_code just entered
        } else { //this is a new user_code register it
            $this->validate($request, User::$rules);
            //if valid data, create a new user
            $new_user = array('user_code' => $request->user_code,
                              'faulty_count'=>0);
            $user = User::create($new_user);
        }
        //authenticate the new user
        Auth::loginUsingId($user->id);
        return redirect()->route('users.index');
    }

    public function doLogout() {
        Auth::logout(); //log user out
        return redirect()->route('welcome');
    }

    public function doWelcome() {
        $total_codes = User::count();
        return view('welcome', compact('total_codes'));
    }

}
