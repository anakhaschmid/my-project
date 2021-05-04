<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User_details extends Model
{
    protected $fillable = [
        'email', 'dob', 'city', 'login_id', 'status'
    ];

    protected $table = 'user_details';
}



   

   


