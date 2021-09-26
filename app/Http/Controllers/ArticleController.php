<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::allPaginate(10);
        return view('app.article.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::findBySlug($slug);
        return view('app.article.show', compact('article'));
    }
}
