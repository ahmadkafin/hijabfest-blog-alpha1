@extends('layouts.apps')

@push('styles')
@endpush

@section('content')
<div class="row">
    <div class="col-6 py-5">
        <h4>Dashboard</h4>
        <p class="text-gray">Page Articles, {{Auth::user()->name}}</p>
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
            <a href="/admin/categories/create" class="btn btn-success">Tambah Kategori</a>
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
    <div class="col-12 item-wrapper">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Jumlah Artikel</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->pivots_count}}</td>
                        <td>
                            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-sm btn-info">Edit</a> |
                            <a href="javascript:void(0)" data-href="{{route('categories.destroy', $category->id)}}" data-kategori="{{$category->category_name}}" id="delete-kategori" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@include('modal.page-category-modal')

@push('scripts')
<script>
    $(document).on('click', '#delete-kategori', function() {
        var title = $(this).data('kategori');
        var action = $(this).data('href');
        $('#delete-kategori-modal').modal('show');
        $('.delete-title').text(title);
        $('#form-kategori-delete').attr('action', action);
    });
</script>
@endpush