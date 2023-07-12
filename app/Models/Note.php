<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\UserProfile;

class Note extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable=[
        'user_id',
        'user_profile_id',
        'notes_id',
        'note_text',
    ];
    
    
    public function userprofileid()
    {
       return $this->hasMany(UserProfile::class,'id','user_profile_id');
    }

}
