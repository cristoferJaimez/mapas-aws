<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    public function login(Request $request ){
        $remember = $request->filled('remember');

        if(Auth::attempt($request->only('email', 'password'), $remember)){
            request()->session()->regenerate();
            return redirect()->intended('home')->with('status', 'You are logger in!');

        }else{
            return redirect()->intended('/')->with('status', "You're logger out!");
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }


   public function logout(Request $request ,  Redirector $redirect){
    try {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return $redirect->to('/')->with('status', "You're logger out");
    } catch (\Throwable $th) {
        return $redirect->to('/')->with('status', "You're logger out");
    }
   }
}
