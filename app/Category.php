<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public function posts() :HasMany
    {
        return $this->hasMany('App\Post');
    }

    public function getLists()
    {
        $categories = Category::orderBy('id', 'asc')->pluck('name', 'id');

        return $categories;
    }
}
