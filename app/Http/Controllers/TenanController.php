<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\TenanRepositories;
use App\Repositories\UsersRepositories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TenanController extends Controller
{
    private $users, $tenan;

    public function __construct(UsersRepositories $users, TenanRepositories $tenan)
    {
        $this->users = $users;
        $this->tenan = $tenan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->users->getUserTenan();
        return view('admin.page-tenan-show', compact('users'));
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
    public function show($slug)
    {
        $slug = Str::of(request()->segment(3))->replace('-', ' ');
        $user = $this->users->findUserByName($slug);
        return view('admin.page-tenan-show-user-brands', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show user brand
     * 
     * @param string $slugs
     * @return \Illuminate\Http\Response
     */
    public function tenanBrand($slug)
    {

    }
}
