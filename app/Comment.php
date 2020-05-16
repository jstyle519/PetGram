<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text', 'article_id',
    ];

    public function article()
    {
        return $this->belongsto(App\Article);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
