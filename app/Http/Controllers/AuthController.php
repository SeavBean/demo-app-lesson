<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    public function auth(Request $request){
        $validated = $request->validate([
            'email'=> ['required','email'],
            'password'=> ['required']
        ]);
        if(Auth::attempt($validated)){
            $request-> session()->regenerate();
            return redirect()->intended(route('admin.category.index'));
        }
        return back()->withErrors([
            'email'=> 'The provided credentials do not match our records.'

        ])->onlyInput('email');
    }
    
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function signup(Request $request){
        $validated = $request->validate([
            'email'=> ['required','email'],
            'password'=> ['required']
        ]);
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password= bcrypt($request->password);
        $user->save();

        Auth::login($user);
        // commend to create database and save it
        return redirect()->route('home');
       
    }
   
}
