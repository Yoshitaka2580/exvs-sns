<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{

    protected $fillable = [
        'message',
    ];

    public function room()
    {
        return $this->hasOne('App\ChatRoom', 'id', 'chat_room_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
