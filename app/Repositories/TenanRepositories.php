<?php

namespace App\Repositories;
use App\Models\TenantModel;

class TenanRepositories
{

    /**
     * get TenanBase on Users
     * 
     * @param int $id
     * @return void
     */

    public function getTenan(int $id)
    {
        TenantModel::where('user_id', $id)->get();
    }
}
