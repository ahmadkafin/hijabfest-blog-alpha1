<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\updateArticleRequest;
use App\Models\ArticlesModel;
use Illuminate\Http\Request;
use App\Repositories\ArticlesRepositories;
use App\Repositories\CategoriesRepositories;
use App\Repositories\PivotsArticleRepositories;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
use App\Services\ArticleServices as ArticleServices;

class ArticlesController extends Controller
{

    private $article, $category, $pivots;

    public function __construct(ArticlesRepositories $article, CategoriesRepositories $category, PivotsArticleRepositories $pivots)
    {
        $this->article = $article;
        $this->category = $category;
        $this->pivots = $pivots;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 10;
        $articles = $this->article->getArticle($page);
        return view('admin.page-articles-show', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->getCategory();
        return view('admin.page-articles-create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        DB::beginTransaction();
        try {
            $dataArtikel = $this->article->createArticle([
                'article_title'         => $request->article_title,
                'article_slug'          => $request->article_slug,
                'article_content'       => $request->article_content,
                'article_url_video'     => $request->article_url_video,
                'article_video_embeed'  => $request->article_video_embeed
            ]);
            $categories = $request->category_name;
            $dataArtikel->category()->sync($categories);
            DB::commit();
            return redirect('admin/articles')->with('status', 'Data ' . $request->article_title . ' berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = $this->article->getArticleBySlug($slug);
        return view('publish.show-article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->category->getCategory();
        $article    = $this->article->findArticle($id);
        return view('admin.page-articles-edit', compact('categories', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateArticleRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $articles = $this->article->getsArticle($id);
            ArticleServices::updateArticles($request, $articles);
            $categories = $request->category_name;
            $articles->category()->sync($categories);
            DB::commit();
            return redirect('admin/articles')->with('status', 'Data ' . $request->article_title . ' berhasil update');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->article->deleteArticle($id);
        $this->pivots->deletePivots($id);
        return redirect()->back()->with('status', 'Artikel berhasil di hapus');
    }

    /**
     * get slug for add and update article.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function getSlug(Request $request)
    {
        $slug = SlugService::createSlug(ArticlesModel::class, 'article_slug', $request->article_title);
        return response()->json(['slug' => $slug]);
    }


    /**
     * Publish and unpublish article 
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function publishArticle($id)
    {
        DB::beginTransaction();
        try {
            $article = $this->article->getsArticle($id);
            $article->article_status == false ? $article->update(['article_status' =>  true]) : $article->update(['article_status' =>  false]);
            DB::commit();
            return redirect()->back()->with('status', $article->article_title . ' berhasil di ' . ($article->article_status == false ? 'un-publish' : 'publish'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('message', 'Ada kesalahan pada ' . $e->getMessage());
        }
    }
}
