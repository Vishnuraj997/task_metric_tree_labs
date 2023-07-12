<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use Hash;
use Session;

class UserController extends Controller
{
    
    public function index()
    {
        return view('index');
    }


    public function register()
    {
        return view('register');
    }


    public function registerUser(Request $request)
    {
      $request->validate([
         'firstname' =>'required',
         'lastname' =>'required',
         'email'=>'required|email|unique:users',
         'password'=>'required|min:5|max:12',
         'address'=>'required|min:10|max:100'
      ]);
      $user= new User();
      $user->email=$request->email;
      $user->password=$request->password;
      $res=$user->save();
      $user_profile =new UserProfile();
      $user_profile->first_name=$request->firstname;
      $user_profile->last_name=$request->lastname;
      $user_profile->address=$request->address;
      $user_profile->user_id=$user->id;
      $result=$user_profile->save();
      if($res && $result){
        return back()->with('success','You have Registered successfully');
      }else{
        return back()->with('fail','Something went wrong');
      }

    }
    
    public function loginUser(Request $request)
    {

        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12',
         ]);
         $user = User::where('email','=',$request->email)->first();
         if($user)
         {
            if(Hash::check($request->password,$user->password))
            {
               $request->session()->put('loginId',$user->id);
               return redirect('home');
            }else{
                return back()->with('fail','password is incorrect');
            }
            return back()->with('success','You have Logged successfully');
         }else{
            return back()->with('fail','email is incorrect');
         }
    }
    public function home()
    {
    
      $user_id=Session::get('loginId');
      return view('home',compact('user_id'));
    }

    public function logout()
    {
        Auth::logout();
    }
}
