<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $table='users_profile';


    protected $fillable=[
        'first_name',
        'last_name',
        'address',
    ];
}
