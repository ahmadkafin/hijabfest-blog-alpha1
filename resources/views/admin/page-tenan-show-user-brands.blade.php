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
                <li class="breadcrumb-item" aria-current="page"><a
                        href="/admin/{{Request::segment(2)}}">{{Request::segment(2)}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{Str::of(request()->segment(3))->replace('-', ' ')}}</li>
            </ol>
        </nav>
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
    <div class="mx-auto">
        @if ($user->tenants->isEmpty())
        <span>This user doesn't have brand</span>
        @else
        <div class="card-deck my-5">
            @foreach ($user->tenants as $tenan)
            <div class="card text-center" style="width: 18rem">
                <img class="card-img-top"
                    src="{{asset($tenan->tenant_logo == null ? '/img/logo.png' : '/img/tenan/'.$tenan->tenant_logo)}}"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: 800">
                        <a href="{{route('tenan.brand', $tenan->tenant_slugs)}}">
                            {{Str::title($tenan->tenant_brand)}}
                        </a>
                    </h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional
                        content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>

</div>
@endsection

@push('scripts')

@endpush