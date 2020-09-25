<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{

    protected $fillable = [
        'title',
        'body',
    ];
    
    public function user(): BelongsTo 
    {
        return $this->belongsTo('App\User');
    }

    //記事は複数のお気に入りと複数のユーザーを持つ
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }
    
    public function isLikedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->likes->where('id', $user->id)->count()
            :false;
    }

    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    
    // 一つの投稿は複数のコメントを持つ
    public function comments(): HasMany
    {
        return $this->hasMany('App\Comment');
    }
}
