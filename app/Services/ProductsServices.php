<?php

namespace App\Services;

use App\Models\ImagesProductsModel;
use App\Repositories\ProductsRepositories;
use Carbon\Carbon;

class ProductsServices
{
    public function popData($request)
    {
        $rand = rand(00000, 99999);
        $data = [
            'sku_products'              => 'IHFPRD' . $rand,
            'products_name'             => $request->products_name,
            'products_slugs'            => $request->products_slugs,
            'products_weight'           => $request->products_weight,
            'products_dimension_width'  => $request->products_dimension_width,
            'products_dimension_height' => $request->products_dimension_height,
            'products_dimension_wide'   => $request->products_dimension_wide,
            'products_qty'              => $request->products_qty,
            'products_price'            => $request->products_price
        ];
        return $data;
    }

    public function imagesUpload($idProd, $request)
    {
        for ($i = 1; $i <= 5; $i++) {
            $file = $request->file('file-' . $i);
            $now = Carbon::now()->format('D-m');
            $filename = md5($now . "-" . $file->getClientOriginalName()) . "." . $file->getClientOriginalExtension();
            $dir = public_path() . '/img/products/' . $request->products_slugs;
            $file->move($dir, $filename);
            ImagesProductsModel::create([
                'products_id'   => $idProd,
                'images_name'   => $filename
            ]);
        }
    }

    public function imagesUpdateUpload($id, $request)
    {
        $products = new ProductsRepositories;
        $product = $products->findProducts($id);
        $now = Carbon::now()->format('D-m');
        // foreach ($product->images as $keys => $image) {
        //     if ($request->file('file' . $keys) == null) {
        //         break;
        //     }
        //     $file = $request->file('file' . $keys);
        //     $filename  = md5($now . "-" . $file->getClientOriginalName()) . "." . $file->getClientOriginalExtension();
        //     $dir = public_path() . '/img/products/' . $request->products_slugs;
        //     $file->move($dir, $filename);
        //     ImagesProductsModel::where('id', $image->id)->update(['images_name' => $filename]);
        // }

        if ($request->hasFile('file0')) {
            $file = $request->file('file0');
            $filename  = md5($now . "-" . $file->getClientOriginalName()) . "." . $file->getClientOriginalExtension();
            $dir = public_path() . '/img/products/' . $request->products_slugs;
            $file->move($dir, $filename);
            ImagesProductsModel::where('id', $request->file_id_0)->update(['images_name' => $filename]);
        }
        if ($request->hasFile('file1')) {
            $file = $request->file('file1');
            $filename  = md5($now . "-" . $file->getClientOriginalName()) . "." . $file->getClientOriginalExtension();
            $dir = public_path() . '/img/products/' . $request->products_slugs;
            $file->move($dir, $filename);
            ImagesProductsModel::where('id', $request->file_id_1)->update(['images_name' => $filename]);
        }
        if ($request->hasFile('file2')) {
            $file = $request->file('file2');
            $filename  = md5($now . "-" . $file->getClientOriginalName()) . "." . $file->getClientOriginalExtension();
            $dir = public_path() . '/img/products/' . $request->products_slugs;
            $file->move($dir, $filename);
            ImagesProductsModel::where('id', $request->file_id_2)->update(['images_name' => $filename]);
        }
        if ($request->hasFile('file3')) {
            $file = $request->file('file3');
            $filename  = md5($now . "-" . $file->getClientOriginalName()) . "." . $file->getClientOriginalExtension();
            $dir = public_path() . '/img/products/' . $request->products_slugs;
            $file->move($dir, $filename);
            ImagesProductsModel::where('id', $request->file_id_3)->update(['images_name' => $filename]);
        }
        if ($request->hasFile('file4')) {
            $file = $request->file('file4');
            $filename  = md5($now . "-" . $file->getClientOriginalName()) . "." . $file->getClientOriginalExtension();
            $dir = public_path() . '/img/products/' . $request->products_slugs;
            $file->move($dir, $filename);
            ImagesProductsModel::where('id', $request->file_id_4)->update(['images_name' => $filename]);
        }
    }
}
