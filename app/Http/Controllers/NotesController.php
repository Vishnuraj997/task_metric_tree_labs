<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Note;
use Auth;
use Session;

class NotesController extends Controller
{

   public function home()
   {
    
     $user_id=Session::get('loginId');
     $mynotes=Note::where('user_id',$user_id)->get();
     return view('home',compact('user_id','mynotes'));
   }
   public function create($id)
   {

     $data=UserProfile::where('user_id',$id)->first();
     $user_profile_id=$data->id;
     return view('createnote',compact('user_profile_id','id'));
   }

   public function createnote(Request $request)
   {
      $note= new Note();
      $note->user_id=$request->user_id;
      $note->user_profile_id=$request->user_profile_id;
      $note->note_text=$request->note;
      $res= $note->save();
      if($res)
      {
         $note->notes_id=$note->id;
         $note->update();
         $user_id=$request->user_id;
         return view('home',compact('user_id'));
      }
      return view('home',compact('user_id'));

   }

   public function edit($id)
   {
      $note_details=Note::where('id',$id)->first();
      $user_profile_id=$note_details->user_profile_id;
      return view('editnote',compact('id','user_profile_id','note_details'));
   }

   public function editnote(Request $request)
   {
      $note_details=Note::where('id',$request->notes_id)->update(['note_text' => $request->note]);
      return $note_details;
   }

   public function delete($id)
   {
    Note::where('id',$id)->delete();
    return redirect('home');
   }



}
