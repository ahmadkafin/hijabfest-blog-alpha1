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

    /**
     * get user with id
     * 
     * @param [int] $id
     * 
     * @return void
     */
    public function findUser(int $id)
    {
        return User::select('id', 'name', 'roles')->findOrFail($id);
    }

    /**
     * update roles users
     * @param [int] $id
     * @param [array] $data
     * 
     * @return void
     */
    public function updateRoles(int $id, array $data)
    {
        return User::where('id', $id)->update($data);
    }

}
