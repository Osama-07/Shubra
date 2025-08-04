<?php

namespace App\Http\Controllers\Article;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController
{
    //
    public function index()
    {
        $articles = Article::all();

        return response()->json([
            'articles' => $articles
        ], 200);
    }

    public function show(Article $article)
    {
        return response()->json([
            'article' => $article
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user()->id
        ]);

        return response()->json([
            'article' => $article
        ], 201);
    }
}
