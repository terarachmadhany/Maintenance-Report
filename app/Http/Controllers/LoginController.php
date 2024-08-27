<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            "email"=> "required",
            "password"=> "required",
        ]);

        if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where("email", $request->email)->first();
        if($user){
            if($user->password != $request->password){
                return redirect()->back()->withErrors("password")->withInput();
            }else{
                $request->session()->regenerate();
                $request->session()->put("email", $request->email);

                return redirect()->route('home');
            }
        }else{
            return redirect()->back()->withErrors('email')->withInput();
        }
    }

    public function logout(){
        session()->invalidate();
        return redirect('/');
    }
}
