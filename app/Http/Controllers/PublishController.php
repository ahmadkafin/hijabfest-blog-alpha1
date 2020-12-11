<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticlesRepositories;

class PublishController extends Controller
{
    private $articles;

    public function __construct(ArticlesRepositories $articles)
    {
        $this->articles = $articles;
    }

    public function index()
    {
    }

    public function show($slug)
    {
        $article = $this->article->getArticleBySlug($slug);
        return view('publish.show-article', compact('article'));
    }
}
