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
                    <tr>
                        <th>No.</th>
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$i++}}.</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <span
                                class="badge {{($user->roles == 'admin' ? 'badge-success' : ($user->roles == 'tenant' ? 'badge-info' : 'badge-warning'))}}">
                                {{$user->roles}}
                            </span>
                        </td>
                        <td align="right">
                            <a href="{{route('users.edit', $user->id)}}" class="btn btn-info btn-sm"><i
                                    class="mdi mdi-table-edit"></i> Edit Roles</a>
                            <a href="#" class="btn btn-danger btn-sm" id="users-delete"><i class="mdi mdi-delete"></i>
                                Hapus</a>
                            <a href="#"
                                class="btn {{$user->account_status == false ? 'btn-success' : 'btn-danger'}} btn-sm"><i
                                    class="{{$user->account_status == false ? 'mdi mdi-account-check' : 'mdi mdi-account-off'}}"></i>
                                {{$user->account_status == false ? 'Aktifkan' : 'Non-aktifkan'}}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('modal.page-users-modal')
@endsection

@push('scripts')
<script>
    $(document).on('click', '#users-delete', function(){
        $('#users-modal-delete').modal('show');
    });
</script>
@endpush