@extends('layouts.apps')

@push('styles')
@endpush

@section('content')
<div class="row">
    <div class="col-6 py-5">
        <h4>Tambah artikel baru</h4>
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
                <li class="breadcrumb-item active" aria-current="page">{{Request::segment(3)}}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-6 py-5 mx-auto">
        <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama kategori">Nama Kategori</label>
                <input type="text" name="category_name"
                    class="form-control @error('category_name') is-invalid @enderror" placeholder="nama kategori"
                    autofocus />
                <small id="article-slug" class="form-text">Masukan kategori baru disini</small>
                @error('category_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-danger" id="btnBack">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('btnBack').onclick = function() {
        var link = '/admin/categories';
        location.href = link;
    }
</script>
@endpush