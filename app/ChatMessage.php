<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatMessage extends Model
{
    protected $fillable = [
        'chat_room_id',
        'user_id',
        'message',
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
