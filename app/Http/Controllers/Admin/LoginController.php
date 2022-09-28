<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function getLogin(){

        return view('admin.auth.login');
    }
    public function login(Request $request){//LoginRequest missed the email param




            $remember_me = $request->has('remember_me') ? true : false;

            if (auth()->guard('web')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
                return redirect() -> route('home');
            }


        return redirect()->route('admin.login')->with(['error' => 'هناك خطا بالبيانات']);
    }

    public function logout(){
        auth()->guard('web')->logout();
        return redirect()->route('admin.login');
    }

}
