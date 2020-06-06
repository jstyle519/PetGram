<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    //
    // バリデーション
    protected $fillable = [
        'title',
        'body',
        'image',
    ];
    
    // userリレーション
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    // commentsリレーション
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    // likes
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

    public function isLikedBy(?User $user): bool
    {
        return $user
        ?(bool)$this->likes->where('id', $user->id)->count()
        : false;
    }

    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }

    // tag
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
