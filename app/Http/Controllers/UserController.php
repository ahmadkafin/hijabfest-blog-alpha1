<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UsersRepositories;
use App\Services\UserServices;

class UserController extends Controller
{
    

    public function __construct(UsersRepositories $users)
    {
        $this->users = $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->users->getUser();
        return view('admin.page-management-users-show', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->users->findUser($id);
        return view('admin.page-user-edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $userServices   = new UserServices;
            $checkRoles     = auth()->user()->roles != 'admin';
            $posts          = $request->roles == 'admin';
            $data           = $userServices->popData($request);
            if($checkRoles) {
                if($posts) {
                    return redirect()->back()->with('message', 'kamu ga berhak buat ngerubah roles user jadi admin');
                }
            }
            $this->users->updateUser($id, $data);
            return redirect('admin/users/')->with('status', 'berhasil update roles!');
        } catch(\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->users->deleteUser($id);
        return redirect()->back()->with('status', 'kamu berhasil menghapus user');
    }

    /**
     * update status aktif user
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatusUser($id)
    {
        try {
            $users = $this->users->findUser($id);
            $user = $users->account_status == true ? false : true;
            $status = $users->account_status == true ? 'berhasil menonaktifkan user ' : 'berhasil mengaktifkan user ';
            $this->users->updateUser($id, ['account_status' => $user]);
            return redirect()->back()->with('status', $status . $users->name);
        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
    }
}
