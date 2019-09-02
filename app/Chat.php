<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'sender_id','receiver_id', 'message'
    ];
}
