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
        return User::select(['id','name','email','roles', 'username', 'account_status'])->orderBy('created_at')->paginate(10);
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
        return User::select('id', 'name', 'roles', 'account_status')->findOrFail($id);
    }

    /**
     * get user with id
     * 
     * @param [int] $id
     * 
     * @return void
     */
    public function findUserByName(string $slug)
    {
        return User::select('id', 'name')->where('name', $slug)->where('roles', 'tenan')->with('tenants')->firstOrFail();
    }

    /**
     * update roles users
     * @param [int] $id
     * @param [array] $data
     * 
     * @return void
     */
    public function updateUser(int $id, array $data)
    {
        return User::where('id', $id)->update($data);
    }

    /**
     * delete user
     * @param [int] $id
     * 
     * @return void
     */
    public function deleteUser(int $id)
    {
        return User::where('id', $id)->delete();
    }

    /**
     * get user tenan
     * @return void
     */
    public function getUserTenan()
    {
        return User::select('id', 'name')->where('roles', 'tenan')->withCount('tenants')->get();
    }

}
