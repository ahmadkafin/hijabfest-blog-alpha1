@extends('layouts.apps')

@push('styles')

@endpush

@section('content')
<div class="row">
    <div class="col-6 py-5">
        <h4>Dashboard</h4>
        <p class="text-gray">Page Categories, {{Auth::user()->name}}</p>
    </div>
</div>

<div class="row mx-auto">
    <div class="col-md-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{Request::segment(2)}}</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-4">
        <div class="float-right">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-search"></i></span>
                <input type="text" class="form-control" placeholder="search user" aria-label="Username"
                    aria-describedby="basic-addon1">
            </div>
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
    <div class="col-8 item-wrapper mx-auto">
        <div class="table-responsive">
            <table class="table table-striped table-info">
                <thead>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Jumlah Brand</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$i++}}.</td>
                        <td><a href="{{route('tenan.show', Str::slug($user->name,'-'))}}">{{$user->name}}</a></td>
                        <td>{{$user->tenants_count}}</td>
                        <td>Aksi</td>
                    </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush