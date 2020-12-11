<?php

namespace App\Repositories;

use App\Models\PivotsArticlesModel;

class PivotsArticleRepositories
{
    /**
     * insert into table pivots
     * @param [string] $data
     * @return void 
     */
    public function createPivots(array $data)
    {
        return PivotsArticlesModel::create($data);
    }

    /**
     * remove from pivots
     * @param [int] $id
     * 
     */
    public function deletePivots(int $id)
    {
        return PivotsArticlesModel::where('id_articles', $id)->delete();
    }
}
