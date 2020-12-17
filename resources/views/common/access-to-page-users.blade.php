@extends('layouts.apps')

@section('content')
<div class="row">
    <div class="col-6 py-5">
        <h4>Dashboard</h4>
        <p class="text-gray">Page users, {{Auth::user()->name}}</p>
    </div>
</div>

@if ($message = Session::get('message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Astagfirullah!</strong> {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row">
    <div class="mx-auto">
        <div class="text-center">
            <h2>Kamu mencoba akses ke halaman ini</h2>
            <h3>silakan masukan password untuk mengakses halaman ini</h3>
        </div>
        <hr>
        <form action="{{route('users.verifications')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="input password">Silakan input password kamu</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="this_pass"
                    placeholder="masukan password" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button class="btn btn-info btn-block" type="submit">Submit</button>
        </form>

    </div>
</div>
@endsection