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
    public function createCategories(string $data)
    {
        return CategoriesModel::updateOrCreate(
            ['category_name' => $data],
            ['category_name' => $data]
        );
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
     */
    public function existCat(string $id)
    {
        return CategoriesModel::where('id', $id)->exists();
    }
}
