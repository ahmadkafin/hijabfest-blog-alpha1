<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use App\Repositories\CategoriesRepositories;
use App\Services\CategoriesServices;

class CategoriesController extends Controller
{
    private $categories;

    public function __construct(CategoriesRepositories $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categories->paginateCategories();
        return view('admin.page-categories-show', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page-categories-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        try {
            $categories = new CategoriesServices;
            $cat = $categories->popData($request->category_name);
            $this->categories->createCategories($cat);
            return redirect('/admin/categories')->with('status', 'kategori ' . $request->category_name . ' berhasil di buat');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'ada kesalahan pada ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categories->findCategories($id);
        return view('admin.page-categories-edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        try {
            $category = new CategoriesServices;
            $data = $category->popData($request->category_name);
            $this->categories->updateCategories($id, $data);
            return redirect('/admin/categories')->with('status', 'kategori ' . $request->category_name . ' berhasil di edit');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'gagal update ' . $request->category_name . ' karena ' . $e->getMessage());
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
        $this->categories->destroyCategories($id);
        return redirect()->back()->with('status', 'berhasil menghapus kategori');
    }
}
