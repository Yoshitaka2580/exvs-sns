<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    public function getHashTagAttribute(): string
    {
        return '#' . $this->name;
    }

    public function posts() :BelongsToMany
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
}
