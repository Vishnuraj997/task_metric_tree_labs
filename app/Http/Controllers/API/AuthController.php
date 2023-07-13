<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Note;
use Hash;

class AuthController extends Controller
{
    public function registerUser(Request $request)
    {
      $data= $request->validate([
         'firstname' =>'required',
         'lastname' =>'required',
         'email'=>'required|email|unique:users',
         'password'=>'required|min:5|max:12',
         'address'=>'required|min:10|max:100'
      ]);
      $user= User::create([
         'email'=>$data['email'],
         'password'=>$data['password'],
      ]);
   
      if($user)
      {
        $user_id=$user['id'];
        $user_profile= UserProfile::create([
            'first_name'=>$data['firstname'],
            'last_name'=>$data['lastname'],
            'address'=>$data['address'],
            'user_id'=>$user_id,
         ]);
      }
      
      $token =$user->createToken('TaskProjectToken')->plainTextToken;
    
      

      $response =[
        'user'=>$user,
        'user_profile'=>$user_profile,
        'token' =>$token,
      ];

      return response($response,201);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response(['message'=>'logged out']);

    }

    public function login(Request $request)
    {

        $data=$request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12',
         ]);
         $user = User::where('email',$data['email'])->first();
         if(!$user || !Hash::check($data['password'],$user->password) )
         {
               return response(['message'=>'Inavlid Credentials'],401);
         }else{
            $token =$user->createToken('TaskProjectTokenLogin')->plainTextToken;
            $response= [
                'user'=>$user,
                'token'=>$token,
            ];
            return response($response,200);
         }
    }


    public function delete($id)
    {
     $data=Note::where('id',$id);
     if($data){
       $data->delete();
       return response()->json(['message'=>'Note deleted'],200);
     }
     else
     {
       return response()->json(['message'=>'Note not Found'],404);
     }
   
    }
 
}
