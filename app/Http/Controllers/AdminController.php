<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location as Location;
use App\Repositories\ArticlesRepositories;

class AdminController extends Controller
{

    private $article;

    public function __construct(ArticlesRepositories $article)
    {
        $this->article = $article;
    }

    public function index()
    {
        // $ip = '36.71.227.20';
        // $data = Location::get($ip);
        // dd($data);

        return view('admin.dashboard');
    }

    public function pageArticles()
    {
        $page = 10;
        $articles = $this->article->getArticle($page);
        return view('admin.page-articles-show', compact('articles'));
    }
}
