<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Note;
use Session;
use Auth;


class NotesController extends Controller
{

   public function create(Request $request,$id)
   {
     $user_id=Session::get('loginId');
     $data=UserProfile::where('id',$user_id)->with('userprofileid')->first();
     $user_profile_id=$data->userprofileid[0]->id;
     return view('createnote',compact('user_profile_id','id'));
   }

   public function createnote(Request $request)
   {
      $request->validate([
          'note_text'=>'required',
      ]);
      $note= new Note();
      $note->user_id=$request->user_id;
      $note->user_profile_id=$request->user_profile_id;
      $note->note_text=$request->note_text;
      $res= $note->save();
 
      if($res)
      {
         $note->notes_id=$note->id;
         $note->update();
         $user_id=$request->user_id;
         return redirect('home');
         // return response(['message'=>'Note created']);
      }
    
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


   public function updatenoteforapi(Request $request,$note_id)
   {
      $request->validate([
         'note_text'=>'required',
     ]);
     $note=Note::find($note_id);
     if($note)
     {
      $note->note_text=$request->note_text;
      $note->update();
      return response()->json(['message'=>'updated successfully'],200);
     }
     else
     {
      return response()->json(['message'=>'Note not Found'],404);
     }
 
   }

   public function notes($user_id)
   {
     $mynotes=Note::where('user_id',$user_id)->get();
      return response()->json(['my notes'=>$mynotes],200); 
   }

   public function delete($id)
   {
    $data=Note::where('id',$id);
    if($data){
      $data->delete();
      return redirect('home');
    }
    else
    {
      return response()->json(['message'=>'Note not Found'],404);
    }
  
   }
   



}
