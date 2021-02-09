<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Psy\CodeCleaner\ReturnTypePass;

class Post extends Model
{

    protected $fillable = [
        'title',
        'body',
        'category_id',
        'status',
    ];

    /**
     * 募集状態定義
     */
    const STATUS = [
        1 => ['label' => '受付中', 'class' => 'bg-success'],
        2 => ['label' => '終了',  'class' => 'bg-danger'],
    ];
    
    public function user(): BelongsTo 
    {
        return $this->belongsTo('App\User');
    }

    /**
     * 記事は複数のお気に入りと複数のユーザーを持つ
     */
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }
    
    /**
     * ユーザーモデルを渡して、そのユーザーがいいね済みかどうかを判定
     */
    public function isLikedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->likes->where('id', $user->id)->count()
            :false;
    }
    
    /**
     * 現在のいいね数を算出する
     */
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

    //投稿は一つのカテゴリーに属する
    public function category(): BelongsTo
    {
        return $this->belongsTo('App\Category');
    }

    // ローカルスコープ カテゴリーidがあるかチェック
    public function scopeCategoryAt($query, $category_id)
    {
        if (empty($category_id)) {
            return;
        }

        return $query->where('category_id', $category_id);
    }

    /**
     * 募集状態のラベル
     * @return string
     */

    public function getStatusLabelAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    /**
     * 募集状態を表すHTMLクラス
     * @return string
     */

    public function getStatusClassAttribute()
    {
        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['class'];
    }
}
