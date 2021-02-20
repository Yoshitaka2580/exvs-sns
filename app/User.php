<?php

namespace App;

use App\Mail\BareMail;
use App\Notifications\PasswordResetNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'body',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token, new BareMail()));
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'follows', 'followee_id', 'follower_id')->withTimestamps();
    }

    /**
     * フォロー中・フォローするユーザーモデルにアクセス
     */
    public function followings(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'follows', 'follower_id', 'followee_id')->withTimestamps();
    }

    public function isFollowedBy(?User $user): bool
    {
        return $user
            ? (bool) $this->followers->where('id', $user->id)->count()
            : false;
    }

    /**
     * ユーザーモデルの全フォロワー数を返す
     */
    public function getCountFollowersAttribute(): int
    {
        return $this->followers->count();
    }

    /**
     * ユーザーモデルのフォロー数を返す
     */
    public function getCountFollowingsAttribute(): int
    {
        return $this->followings->count();
    }

    public function posts(): HasMany
    {
        return $this->hasMany('App\Post');
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\Post', 'likes')->withTimestamps();
    }

    public function comments(): HasMany
    {
        return $this->hasMany('App\Comment');
    }
}
