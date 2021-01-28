<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'comment',
    ];

    public function getAtSignAttribute(): string
    {
        return '@' . $this->user->name;
    }

    // 複数のコメントは1つの投稿に
    public function post(): BelongsTo
    {
        
        return $this->belongsTo('App\Post');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }
}
