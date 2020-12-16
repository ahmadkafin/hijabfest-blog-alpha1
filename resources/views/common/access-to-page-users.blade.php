@extends('layouts.apps')

@section('content')
<div class="row">
    <div class="col-6 py-5">
        <h4>Dashboard</h4>
        <p class="text-gray">Page Categories, {{Auth::user()->name}}</p>
    </div>
</div>
<div class="row">
    <div class="mx-auto">
        <h1>Kamu mencoba akses ke halaman ini, silakan masukan password untuk mengakses halaman ini</h1>
    </div>
</div>
@endsection