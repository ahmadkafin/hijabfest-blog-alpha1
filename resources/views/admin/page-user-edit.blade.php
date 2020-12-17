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
                <li class="breadcrumb-item"><a href="/admin/{{Request::segment(2)}}">{{Request::segment(2)}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{Request::segment(4)}} roles</li>
            </ol>
        </nav>
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
    <div class="mx-auto">
        <div class="col-12">
            <div class="card text-center border-primary">
                <div class="card-header">
                    Ganti Roles
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: 800">{{$user->name}}</h5>
                    <hr>
                    <form action="{{route('users.update',  $user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="mx-auto">
                                <div class="form-inline">
                                    <div class="radio mb-3">
                                        <label class="radio-label mr-4"><input type="radio" name="roles" value="admin"
                                                {{$user->roles == 'admin' ? 'checked' : ''}}>Admin
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="radio mb-3">
                                        <label class="radio-label mr-4"><input type="radio" name="roles" value="tenan"
                                                {{$user->roles == 'tenan' ? 'checked' : ''}}>Tenant
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="radio mb-3">
                                        <label class="radio-label mr-4"><input type="radio" name="roles" value="user"
                                                {{$user->roles == 'user' ? 'checked' : ''}}>User
                                            <i class="input-frame"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Change roles!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')

@endpush