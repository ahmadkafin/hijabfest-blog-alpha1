@extends('layouts.apps')

@push('styles')
<style>
    .button:hover span {
        display: none
    }

    .button:hover,
    .foot:hover {
        background-color: #4cceac !important;
        border-color: #4cceac !important;
    }

    .button:hover:before {
        content: "Change to Available?";
    }

    .buttons:hover span {
        display: none
    }

    .buttons:hover,
    .foots:hover {
        background-color: #db504a !important;
        border-color: #db504a !important;
    }

    .buttons:hover:before {
        content: "Change to Not Available?";
    }
</style>

@endpush
@section('content')
<div class="row">
    <div class="col-6 py-5">
        <h4>Dashboard</h4>
        <p class="text-gray">Page Categories, {{Auth::user()->name}}</p>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a
                        href="/admin/{{Request::segment(2)}}">{{Request::segment(2)}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$event->event_name}}</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-6">
        <div class="float-right">
            @if ($booths->isEmpty())
            <a href="{{route('events.booths.add', $event->id)}}" class="btn btn-success">Tambah Booth</a>
            @else
            <a href="{{route('events.booths.add', $event->id)}}" class="btn btn-success">Tambah Booth</a>
            <button type="button" class="btn btn-success" id="batch-edit">Ganti Batch</button>
            @endif
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

<form action="{{route('events.booths.update.batch')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row" id="harga-batch" style="display: none;">
        <div class="col-8">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="masukan harga" name="harga_booth" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <button class="btn btn-success btn-block btn-sm">Submit</button>
            </div>
        </div>
    </div>

    <div class="row">
        @if ($booths->isEmpty())
        <div class="col-12">
            <div class="card-deck">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Data booth tidak ditemukan silakan tambah booth terlebih dahulu</h5>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">NULL</small>
                    </div>
                </div>
            </div>
        </div>
        @else
        @foreach ($booths as $booth)
        <div class="col-2">
            <div class="card-deck">
                <div class="card text-center">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-1 mark-check" style="display: none">
                                <input type="checkbox" name="booth_id[]" value="{{$booth->id}}" />
                            </div>
                        </form>
                            <div class="col-10">
                                <h5 class="card-title">#{{$booth->booth_nomor}}</h5>
                            </div>
                            <div class="col-1">
                                <div class="dropdown float-right">
                                    <i class="mdi mdi-dots-vertical" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="javascript:void(0)" id="ganti-harga"
                                            data-price="{{$booth->booth_price}}" data-name="{{$booth->booth_nomor}}"
                                            data-attr="{{route('events.booths.update.price', $booth->id)}}">Ganti
                                            harga</a>
                                        <a class="dropdown-item" href="javascript:void(0)" id="ganti-nomor"
                                        data-name="{{$booth->booth_nomor}}"
                                        data-attr="{{route('events.booths.update.number', $booth->id)}}">Edit booth nomor</a>
                                        <a class="dropdown-item" href="javascript:void(0)" id="hapus-booth" data-name="{{$booth->booth_nomor}}" data-attr="{{route('events.booths.delete', $booth->id)}}">Hapus booth</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">IDR. {{number_format($booth->booth_price, 0)}}</h5>
                    </div>
                    <form action="{{route('events.booths.marks', $booth->id)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <button
                            class="btn {{$booth->is_active == false ? 'buttons btn-success' : 'button btn-danger'}} btn-block">
                            <span>{{$booth->is_active == false ? 'Available' : 'Not Available'}}</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
@endsection

@include('modal.page-booth-modal-edit');
@push('scripts')
<script>
    $(document).on('click', '#ganti-harga', function(){
            $('#edit-harga-booth').modal('show');
            var price = $(this).data('price');
            var name = $(this).data('name');
            var attr = $(this).data('attr'); 
            $('.titles').text(name);
            $('#input-harga').val(price);
            $('#page-booth-update').attr('action', attr);
        });

    $(document).on('click', '#batch-edit', function(){
        $('.mark-check').toggle(this.clicked);
        $('#harga-batch').toggle(this.clicked);
        $(this).text(function(i, v){
            return v === 'Ganti Batch' ? 'Done?' : 'Ganti Batch';
        });
    });

    $(document).on('click', '#hapus-booth', function(){
        $('#hapus-booth-modal').modal('show');
        var title = $(this).data('name');
        var attr = $(this).data('attr');
        $('.delete-title').text(title);
        $('#form-booth-delete').attr('action', attr);
    });

    $(document).on('click', '#ganti-nomor', function(){
        $('#edit-booth-number').modal('show');
        var name = $(this).data('name');
        var attr = $(this).data('attr'); 
        $('.titles').text(name);
        $('#input-nomor').val(name);
        $('#page-booth-update-number').attr('action', attr);
    });
</script>
@endpush