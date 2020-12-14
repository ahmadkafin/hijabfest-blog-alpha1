<?php

namespace App\Services;

use App\Http\Requests\CategoriesRequest;

class CategoriesServices
{

    public function popData($category_name)
    {
        $data =  ['category_name'    => $category_name];
        return $data;
    }
}
