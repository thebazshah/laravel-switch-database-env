<?php

namespace App\Models;

use App\Models\EnvEnabledModel as Model;

class Tag extends Model
{
    protected $fillable = [
        'title',
        'articleId',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, 'articleId');
    }
}
