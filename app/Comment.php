<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'text', 'article_id',
    ];
    // articleリレーション
    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    // userリレーション
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
