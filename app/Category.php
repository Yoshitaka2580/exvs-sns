<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /**
     * 複数のコメントは一つの投稿に
     */
    public function posts() :HasMany
    {
        return $this->hasMany('App\Post')->withTimestamps();
    }
    /**
     * 全カテゴリーを取得
     */

    public function getLists()
    {
        $categories = Category::orderBy('id', 'asc')->pluck('name', 'id');

        return $categories;
    }
}
