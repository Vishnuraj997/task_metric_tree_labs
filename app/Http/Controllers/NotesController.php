<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;

class NotesController extends Controller
{
   public function create($id)
   {
    
     $data=UserProfile::where('user_id',$id)->first();
     return view('createnote');
   }

   public function createnote(Request $request)
   {
      dd($request->all());
   }
}
