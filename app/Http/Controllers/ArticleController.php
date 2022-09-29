<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function addArticle(Request $request)
    {
        $article = $request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
            'userId' => 'required|integer',
        ]);
        // data in request is valid
        $article = Article::create($article);

        return $article;
    }
}
