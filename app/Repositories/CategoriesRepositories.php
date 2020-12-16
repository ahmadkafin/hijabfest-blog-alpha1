<?php

namespace App\Repositories;

use App\Models\CategoriesModel;

class CategoriesRepositories
{
    /**
     * Insert into Categories
     * @param [array] $data
     * 
     */
    public function createCategories(array $data)
    {
        return CategoriesModel::create($data);
    }

    /**
     * get Category
     * 
     * @return void
     */
    public function getCategory()
    {
        return CategoriesModel::select('id', 'category_name')->get();
    }

    /**
     * check for exist cat
     * @param [int] $id
     * @param [array] $data
     * 
     * @return void
     */
    public function updateCategories(int $id, array $data)
    {
        return CategoriesModel::where('id', $id)->update($data);
    }

    /**
     * get categories paginate
     * @return void
     */

    public function paginateCategories()
    {
        return CategoriesModel::select('id', 'category_name')->withCount('pivots')->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * populate categories id
     * @param [int] $id
     * 
     * @return void
     */

    public function findCategories(int $id)
    {
        return CategoriesModel::findOrFail($id);
    }

    /**
     * Hapus kategori
     * @param [int] $id
     * 
     * @return void
     */

    public function destroyCategories(int $id)
    {
        return CategoriesModel::where('id', $id)->delete();
    }

    /**
     * get Category and Arctile
     * @param [int] $id
     * 
     * @return void 
     */
    public function getCategoryAndArticles(string $slug)
    {
        return CategoriesModel::where('category_name', $slug)->whereHas('pivots', function ($q) {
            $q->with('article');
        })->with('pivots')->get();
    }
}
