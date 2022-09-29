<?php

namespace App\Models;

use App\Models\EnvEnabledModel as Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'text',
        'userId',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'articleId', 'id');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class, 'articleId', 'id');
    }
}
