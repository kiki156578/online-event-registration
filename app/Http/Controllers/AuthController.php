<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\events;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends Controller
{
    
    public function login(){
        return view("pages/login");
        
    }
    
    
    public function registration(){
        return view("pages/registration");

    }
    public function loginHandler(Request $request){
        $request->validate([
            'uid' => 'required',
            'upw' => 'required',
        ]);
    
        $user = User::where('uid', '=', $request->uid)->first();
        if ($user) {
            if (Hash::check($request->upw, $user->upw)) {
                $request->session()->put('loginId', $user->id);
    
                // Reset the login attempt count and login blocked timestamp
    
                return redirect('dashboard');
            } else {
                // Increment the login attempt count and check if the user should be blocked
               
                return back()->with('fail', 'Password not matches');
            }
        } else {
            return back()->with('fail', 'User ID not matches');
        }
    }
    public function registerHandler(Request $request){
        $request->validate([
            'uid'=>'required|unique:users|min:8|max:20',
            'upw'=>'required|min:8|max:20',
            'email'=>'required|email|unique:users'
        ]);
        $user = new User();
        $user->uid=$request->uid;
        $user->upw=Hash::make($request->upw);
        $user->email=$request->email;
        $res = $user->save();
        if($res){
            return redirect('login')->with('success','registered, please login');
        }else{
            return back()->with('fail','hahaha');
        }
    }
    public function dashboard(){
        
       
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
           
            $ue = events::where('uid','=',$data->uid)->get()->all();
           
            
        }
        
        return view('pages/dashboard',compact('ue','data'));
    }
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
           return redirect('login');
    }
}}
