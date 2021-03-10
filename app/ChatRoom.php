<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChatRoom extends Model
{
    public function chatRoomUsers(): HasMany
    {
        return $this->hasMany('App\ChatRoomUser');
    }

    public function chatMessages(): HasMany
    {
        return $this->hasMany('App\ChatMessage');
    }
}
