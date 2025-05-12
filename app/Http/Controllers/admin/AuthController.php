<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('admin.Auth.register');
    }
    public function registerauth(Request $req){
        $req->validate([
            'name'=>'required',
            'email'=>'email|required|unique:users',
            'password'=>'required',
        ]);
        User::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'role'=>0,
            'password'=>Hash::make($req->password),
            
        ]);
        return redirect()->route('Auth.login')->with('success','you are register Successfully');
    }
    
    public function login(){
        return view('admin.Auth.login');
    }
      public function loginauth(Request $req ){
      
             $req->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
         if(Auth::attempt(['email'=>$req->email,'password'=>$req->password])){
        return redirect()->route('Dashboard')->with('success','you are login Successfully');
         }else{
        return redirect()->route('Auth.login')->with('danger','Either Email/password is Incorrect');

         
        }
      }
      public function logout(Request $req){
   
        
            Auth::logout();
            return redirect()->route('admin.list')->with('danger','you are not login');
        
      }
}