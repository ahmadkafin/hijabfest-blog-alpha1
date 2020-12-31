<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Http\Requests\ProductsUpdateRequest;
use App\Models\ImagesProductsModel;
use App\Models\ProductsModel;
use App\Repositories\ProductsRepositories;
use App\Services\ProductsServices;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\Exception\NoFileException;

class ProductsController extends Controller
{

    private $products;

    public function __construct(ProductsRepositories $products)
    {
        $this->products = $products;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->products->getProducts();
        $products = $products ?? NULL;
        return view('admin.page-products-view', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page-products-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        DB::beginTransaction();
        try {
            $prod = new ProductsServices;
            $data = $prod->popData($request);
            $prods = $this->products->storeProducts($data);
            $id = $prods->id;
            $file = $request->file();
            if ($file != null) {
                $prod->imagesUpload($id, $request);
            } else {
                DB::rollBack();
                return redirect()->back()->with('message', 'Kamu harus memasukan 5 file foto yang berbeda.');
            }
            DB::commit();
            return redirect('admin/products/')->with('status', 'Berhasil menyimpan produk ' . $request->products_name);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('message', $e->getMessage());
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
        $product = $this->products->findProducts($id);
        // foreach ($product->images as $keys => $image) {
        //     $d[$keys] = $image->id;
        // }
        // dd($product);
        return view('admin.page-products-edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $prod = new ProductsServices;
            $data = $prod->popData($request);
            $prod->imagesUpdateUpload($id, $request);
            $this->products->updateProducts($id, $data);
            DB::commit();
            return redirect('admin/products/')->with('status', 'Berhasil menyimpan produk ' . $request->products_name);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
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
        //
    }

    /**
     * get slugs products
     * @param \Illuminate\Http\Request  $request
     * 
     */
    public function getSlugProducts(ProductsRequest $request)
    {
        $slugs =  $request->products_name != '' ? SlugService::createSlug(ProductsModel::class, 'products_slugs', $request->products_name) : '';
        return response()->json(['slugs' => $slugs]);
    }
}
