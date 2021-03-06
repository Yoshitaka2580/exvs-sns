<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{

    public function messages()
    {
        return $this->hasMany('App\ChatMessage');
    }
}
