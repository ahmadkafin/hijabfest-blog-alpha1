<?php

namespace App\Repositories;

use App\Models\ProductsModel;

class ProductsRepositories
{

    /**
     * get All products with relations
     * 
     * @return void
     */
    public function getProducts()
    {
        return ProductsModel::with('images')->withCount('images')->simplePaginate(10);
    }

    /**
     * add to products
     * @param array $data
     * 
     * @return \Illuminate\Http\Response
     */
    public function storeProducts(array $data)
    {
        return ProductsModel::create($data);
    }
}
