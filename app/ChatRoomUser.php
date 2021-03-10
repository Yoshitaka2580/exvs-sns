<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatRoomUser extends Model
{
    protected $fillable = [
        'chat_room_id',
        'user_id',
    ];

    public function chatRoom(): BelongsTo
    {
        return $this->belongsTo('App\ChatRoom');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }
}
