<?php

namespace App\Models;

use App\Models\EnvEnabledModel as Model;

class Comment extends Model
{
    protected $fillable = [
        'text',
        'articleId',
        'userId',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function article()
    {
        return $this->belongsTo(Article::class, 'articleId');
    }
}
