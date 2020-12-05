@extends('layouts.apps')

@section('content')
<div class="row">
    <div class="col-12 py-5">
        <h4>Dashboard</h4>
        <p class="text-gray">Welcome aboard, {{Auth::user()->name}}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-6 col-6 equel-grid">
        <div class="grid">
            <div class="grid-body text-gray">
                <div class="d-flex justify-content-between">
                    <p>30%</p>
                    <p>+06.2%</p>
                </div>
                <p class="text-black">Visitor</p>
                <div class="wrapper w-50 mt-4">
                    <canvas height="45" id="stat-line_1"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{asset('js/dashboard-scripts.js')}}"></script>
<script src="{{asset('js/for-charts-scripts.js')}}"></script>
@endpush