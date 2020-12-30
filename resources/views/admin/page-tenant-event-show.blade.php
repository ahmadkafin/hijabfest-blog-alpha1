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
                    {{Str::of(request()->segment(4))->replace('-', ' ')}}</li>
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
        @if ($brands->isEmpty())
        <span>This event doesn't have brand</span>
        @else
        <div class="card-deck my-5">
            @foreach ($brands as $brand)
            <div class="card text-center" style="width: 18rem">
                <img class="card-img-top"
                    src="{{asset($brand->tenants->tenant_logo == null ? '/img/logo.png' : '/img/tenan/'.$brand->tenants->tenant_logo)}}"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: 800">
                        <a href="{{route('tenan.brand', $brand->tenants->tenant_slugs)}}">
                            {{Str::title($brand->tenants->tenant_brand)}}
                        </a>
                    </h5>
                    <div class="card-text my-3">
                        <form action="{{route('events.tenant.update', $brand->id)}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-block {{$brand->is_approved == false ? 'btn-info' : 'btn-danger'}}"
                                type="submit">{{$brand->is_approved == false ? 'Approve' : 'Deny'}}</button>
                        </form>
                    </div>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{\Carbon\Carbon::parse($brand->created_at)->diffForHumans()}}</small>
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