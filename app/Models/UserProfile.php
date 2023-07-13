<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class UserProfile extends Model
{
    use HasFactory,HasApiTokens;
    protected $table='users_profile';


    protected $fillable=[
        'first_name',
        'last_name',
        'address',
    ];

    public function userprofileid()
    {
       return $this->hasMany(User::class,'id','id');
    }
}
