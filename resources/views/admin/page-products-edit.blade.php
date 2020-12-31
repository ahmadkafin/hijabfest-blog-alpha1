@extends('layouts.apps')

@push('styles')
<style>
    .image-upload>input {
        display: none;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-6 py-5">
        <h4>Tambah event baru</h4>
        <p class="text-gray">Page Articles, {{Auth::user()->name}}</p>
    </div>
</div>

@if ($message = Session::get('message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Astagfirullah</strong> {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row">
    <div class="col-md-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/{{Request::segment(2)}}">{{Request::segment(2)}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->products_name}}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12 py-5 mx-auto">
        <form action="{{route('products.update', $product->id)}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    {{-- products name --}}
                    <div class="form-group mb-3">
                        <label for="Product Name">Nama Produk</label>
                        <input type="text" name="products_name" id="products-name" placeholder="Masukan Nama Produk"
                            class="form-control @error('products_name') is_invalid @enderror" autocomplete="false"
                            value="{{$product->products_name}}" autofocus />
                        <small id="products_name" class="form-text">Nama Produk Kamu</small>
                        @error('products_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- end of products name --}}
                </div>
                <div class="col-md-6">
                    {{-- products slugs --}}
                    <div class="form-group mb-3">
                        <label for="Product Slugs">Url Slugs</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">indonesiahijabfest.id/products/</span>
                            <input type="text" id="products-slugs" name="products_slugs"
                                placeholder="Masukan Nama Produk"
                                class="form-control @error('products_slugs') is_invalid @enderror"
                                value="{{$product->products_slugs}}" readonly />
                        </div>
                        <small id="products_slugs" class="form-text">Nama url slug produk</small>
                        @error('products_slugs')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- end of products slugs --}}
                </div>

                <div class="col-md-3">
                    &nbsp;
                </div>
                <div class="col-md-9">
                    <div class="text-center">
                        <span>Dimensi</span>
                    </div>
                    <hr>
                </div>

                {{-- Berat Produk --}}
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="Product weight">Berat Produk</label>
                        <div class="input-group mb-3">
                            <input type="text" id="product_weight" name="products_weight" placeholder="Berat Produk"
                                class="form-control @error('products_weight') is_invalid @enderror"
                                value="{{$product->products_weight}}" />
                            <span class="input-group-text">kg</span>
                        </div>
                    </div>
                    @error('products_weight')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                {{-- end of berat produk --}}

                {{-- dimensi start --}}

                {{-- panjang start --}}
                <div class="col-md-3">
                    <label for="Product weight">Panjang</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">P :</span>
                        <input type="text" id="products_dimension_width" name="products_dimension_width"
                            placeholder="Panjang"
                            class="form-control @error('products_dimension_width') is_invalid @enderror"
                            value="{{$product->products_dimension_width}}" />
                        <span class="input-group-text">cm</span>
                    </div>
                </div>
                {{-- panjang end --}}

                {{-- lebar start --}}
                <div class="col-md-3">
                    <label for="Product weight">Lebar</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">L :</span>
                        <input type="text" id="products_dimension_wide" name="products_dimension_wide"
                            placeholder="Lebar"
                            class="form-control @error('products_dimension_wide') is_invalid @enderror"
                            value="{{$product->products_dimension_wide}}" />
                        <span class="input-group-text">cm</span>
                    </div>
                </div>
                {{-- lebar end --}}

                {{-- tinggi start --}}
                <div class="col-md-3">
                    <label for="Product weight">Tinggi</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">T :</span>
                        <input type="text" id="products_dimension_height" name="products_dimension_height"
                            placeholder="Tinggi"
                            class="form-control @error('products_dimension_height') is_invalid @enderror"
                            value="{{$product->products_dimension_height}}" />
                        <span class="input-group-text">cm</span>
                    </div>
                </div>
                {{-- tinggi end --}}

                {{-- dimensi end --}}

                {{-- qty start --}}
                <div class="col-md-6 py-3">
                    <div class="form-group">
                        <label for="quantity">Qty</label>
                        <div class="input-group mb-3">
                            <input type="text" id="products_qty" name="products_qty" placeholder="qty produk"
                                class="form-control @error('products_qty') is_invalid @enderror"
                                value="{{$product->products_qty}}" />
                        </div>
                    </div>
                    @error('products_qty')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                {{-- qty end --}}

                {{-- price start --}}
                <div class="col-md-6 py-3">
                    <div class="form-group">
                        <label for="Price">Harga produk /pcs</label>
                        <div class="input-group mb-3">
                            <input type="text" id="products_price" name="products_price" placeholder="harga produk"
                                class="form-control @error('products_price') is_invalid @enderror"
                                value="{{$product->products_price}}" />
                        </div>
                    </div>
                    @error('products_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                {{-- price end --}}

                {{-- images start --}}

                <div class="col-md-12">
                    <div class="text-center">
                        <span>Images</span>
                    </div>
                    <hr>
                </div>

                <div class="row py-4">
                    @foreach ($product->images as $keys => $image) <div class="col-md-2 px-5 mx-3">
                        <div class="card" style="18rem">
                            <div class="image-upload">
                                <label for="file-input-{{$keys}}">
                                    <img src="{{asset('img/products/'.$product->products_slugs.'/'.$image->images_name)}}"
                                        id="blah{{$keys}}" class="card-img-top" />
                                </label>
                                <input id="file-input-{{$keys}}" type="file" name="file{{$keys}}" />
                                <input type="text" value="{{$image->id}}" readonly name="file_id_{{$keys}}">
                            </div>
                            @error('file-'.$keys)
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    @endforeach
                </div>



                <div class="input-group hdtuto control-group lst increment">
                    <input type="file" name="filenames[]" class="myfrm form-control">
                    <div class="input-group-btn">
                        <button class="btn btn-success" type="button"><i
                                class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                    </div>
                </div>
                <div class="clone hide">
                    <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                        <input type="file" name="filenames[]" class="myfrm form-control">
                        <div class="input-group-btn">
                            <button class="btn btn-danger" type="button"><i
                                    class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                        </div>
                    </div>
                </div>


                {{-- images end --}}

            </div> {{--row form end--}}

            {{-- button start --}}
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-success btn-block" type="submit">Submit</button>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-danger btn-block" type="button" id="btnBacks">Back</button>
                </div>
            </div>
            {{-- button end --}}
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('#products-name').change(function(e){
            $.get(
                '{{route("getSlugsProducts")}}', {
                'products_name' : $(this).val()
            },
            function(data) {
                $('#products-slugs').val(data.slugs);
            });
        });

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#blah0').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#blah1').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

function readURL3(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#blah2').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

function readURL4(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#blah3').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

function readURL5(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#blah4').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#file-input-0").change(function() {
    readURL(this);
});

$("#file-input-1").change(function() {
    readURL2(this);
});

$("#file-input-2").change(function() {
    readURL3(this);
});

$("#file-input-3").change(function() {
    readURL4(this);
});

$("#file-input-4").change(function() {
    readURL5(this);
});
</script>
@endpush