@extends('layouts.apps')

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
                <li class="breadcrumb-item" aria-current="page"><a
                        href="/admin/events/{{$event->id}}/booths">{{$event->event_name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
    </div>
</div>

@if ($message = Session::get('message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Alhamdulillah</strong> {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row">
    <div class="col-8 mx-auto">
        <form action="{{route('events.booths.store', $event->id)}}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="form-group">
                <label for="nomor terakhir">Nomor booth terakhir pada event ini adalah
                    {{empty($e) ? '0' : $e->booth_nomor}}</label>
            </div>
            <div class="form-group">
                <label for="jumlah-booth">Jumlah Booth</label>
                <input type="text" name="booth" id="booths" class="form-control" autofocus />
            </div>
            <div class="form-inline">
                <div class="checkbox mb-3"><label class="chekbox-label mr-4"><input name="checkbox" type="checkbox"
                            id="inputHarga">Apakah kamu akan menentukan harga booth sekarang? <i
                            class="input-frame"></i></label></div>
            </div>
            <div style="display: none" id="form-group-harga">
                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <label for="harga booth">Base harga booth?</label>
                            <input type="text" class="form-control" name="booth_price" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <div class="mx-auto">
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                            <button type="button" class="btn btn-sm btn-danger" id="btnBack">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).on('click', '#inputHarga', function(){
        $('#form-group-harga').slideDown("fast").toggle(this.checked);
        $('#totalBooth').val('');
        $('.wraps').remove();
    });
    document.getElementById('btnBack').onclick = function() {
        var link = '/admin/events/{{Request::segment(3)}}/booths';
        location.href = link;
    }
</script>
@endpush