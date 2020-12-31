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

    /**
     * find product
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function findProducts(int $id)
    {
        return ProductsModel::findOrFail($id);
    }

    /**
     * find product
     * @param int $id
     * @param array $data
     * 
     * @return \Illuminate\Http\Response
     */
    public function updateProducts(int $id, array $data)
    {
        return ProductsModel::where('id', $id)->update($data);
    }
}
