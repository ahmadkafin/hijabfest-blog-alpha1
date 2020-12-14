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

    private $article, $category, $pivots, $articleServices;

    public function __construct(ArticlesRepositories $article, CategoriesRepositories $category, PivotsArticleRepositories $pivots, ArticleServices $articleServices)
    {
        $this->article = $article;
        $this->category = $category;
        $this->pivots = $pivots;
        $this->articleServices = $articleServices;
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
            $data = $this->articleServices->popData($request);
            $dataArtikel = $this->article->createArticle($data);

            $categories = $request->category_name;
            // sync tabel pivot
            $dataArtikel->category()->sync($categories);

            // populate id on artikel data
            $idArtikel = $dataArtikel->id;
            // file initiation
            $file = $request->file('file');
            // insert into tabel images
            $this->articleServices->imageDrop($idArtikel, $file);
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
