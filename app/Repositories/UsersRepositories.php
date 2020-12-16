<?php

namespace App\Repositories;

use App\Models\User;

class UsersRepositories
{

    /**
     * get all user with paginate
     * @return void
     */

    public function getUser()
    {
        return User::select(['id','name','email','roles', 'username', 'account_status'])->orderBy('name')->paginate(10);
    }
}
