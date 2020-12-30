@extends('layouts.apps')

@section('content')
<div class="row">
    <div class="col-6 py-5">
        <h4>Dashboard</h4>
        <p class="text-gray">Page Categories, {{Auth::user()->name}}</p>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{Request::segment(2)}}</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-6">
        <div class="float-right">
            <a href="/admin/products/create" class="btn btn-success">Tambah Produk</a>
        </div>
    </div>
</div>

@if ($message = Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Alhamdulillah</strong> {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($message = Session::get('message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Alhamdulillah</strong> {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row">
    <div class="col-12 item-wrapper mx-auto">
        <div class="table-responsive">
            <table class="table table-striped table-info">
                <thead>
                    <tr>
                        <th rowspan="2">No.</th>
                        <th rowspan="2">#SKU Products</th>
                        <th rowspan="2">Products Name</th>
                        <th rowspan="2">Products Slugs</th>
                        <th rowspan="2">Products Images</th>
                        <th colspan="3" class="text-center">Dimension (cm)</th>
                        <th rowspan="2" class="text-right">Weight(kg)</th>
                        <th rowspan="2" class="text-right">Price</th>
                        <th rowspan="2">Qty</th>
                        <th rowspan="2">Action</th>
                    </tr>
                    <tr>
                        <th class="text-center">P</th>
                        <th class="text-center">T</th>
                        <th class="text-center">L</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$product->sku_products}}</td>
                        <td>{{$product->products_name}}</td>
                        <td>{{$product->products_slugs}}</td>
                        <td class="text-center">
                            {!!$product->images_count == null ? '<span class="badge badge-danger">Belum ada
                                gambar</span>' : '<span class="badge badge-danger">'.$product->images_count.'</span>'!!}
                        </td>
                        <td class="text-center">{{number_format($product->products_dimension_width)}}</td>
                        <td class="text-center">{{number_format($product->products_dimension_wide)}}</td>
                        <td class="text-center">{{number_format($product->products_dimension_height)}}</td>
                        <td class="text-right">{{$product->products_weight}}</td>
                        <td class="text-right">IDR. {{number_format($product->products_price)}}</td>
                        <td>{{$product->products_qty}}</td>
                        <td>Action</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row py-5">
    <div class="mx-auto">
        {{$products->links()}}
    </div>
</div>
@endsection