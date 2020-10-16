<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFriends extends Model
{
    //
     protected $fillable = [
        'user_id', 'friend_id',
    ];
}
