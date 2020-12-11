<?php

namespace App\Repositories;

use App\Models\ArticlesModel;

class ArticlesRepositories
{

    /**
     *  Get Articles with pagination
     * @param [string] $searchArticle
     * @param [int] $page
     * @return void
     */

    public function searchArticles(string $searchArticle, int $page)
    {
        return ArticlesModel::where('article_title', 'like', '%' . $searchArticle . '%')
            ->with('categories')->paginate($page);
    }

    /**
     *  Get Articles with pagination
     * @param [string] $searchArticle
     * @param [int] $page
     * @return void
     */

    public function getArticle(int $page)
    {
        return ArticlesModel::with('pivots')->orderBy('id', 'desc')->paginate($page);
    }

    /**
     *  Create Articles
     * @param [array] $data
     * 
     */
    public function createArticle(array $data)
    {
        return ArticlesModel::create($data);
    }

    /**
     *  Check Slug Articles
     * @param [string] $data
     * @return void
     */

    public function checkSlug(string $slug)
    {
        return ArticlesModel::where('article_slug', $slug)->exists();
    }

    /**
     * find articles
     * @param [int] $id
     * @return void
     */

    public function findArticle(int $id)
    {
        return ArticlesModel::find($id);
    }

    /**
     * update article
     * 
     * @param [int] $id
     * @param [array] $data
     */

    public function getsArticle(int $id)
    {
        return ArticlesModel::whereId($id)->first();
    }

    /**
     * delete article
     * 
     * @param [int] $id
     * 
     * @return void
     */

    public function deleteArticle(int $id)
    {
        return ArticlesModel::where('id', $id)->delete();
    }

    /**
     * delete article
     * 
     * @param [string] $slug
     * 
     * @return void
     */

    public function getArticleBySlug(string $slug)
    {
        return ArticlesModel::where('article_slug', $slug)->first();
    }
}
