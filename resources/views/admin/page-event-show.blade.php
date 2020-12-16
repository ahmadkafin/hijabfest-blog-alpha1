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

<div class="row">
    <div class="col-md-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{Request::segment(2)}}</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-6">
        <div class="float-right">
            <a href="{{route('events.create')}}" class="btn btn-success">Tambah event</a>
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
                        <th>Nama events</th>
                        <th>Slug events</th>
                        <th>Ada cover?</th>
                        <th>Event aktif?</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @if($events->isEmpty())
                    <tr>
                        <td colspan="6" align="center" class="text-center" style="font-weight: 600;">Belum ada event
                            yang di masukin, input dulu yuk!</td>
                    </tr>
                    @else
                    @foreach($events as $event)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$event->event_name}}</td>
                        <td>{{$event->event_slug}}</td>
                        <td><a href="javascript:void(0)" id="event-cover"
                                class="badge badge-info">{{$event->event_cover != null ? 'yes' : 'no'}}</a></td>
                        <td><span
                                class="badge {{$event->event_is_active == true ? 'badge-success' : 'badge-danger'}}"></span>
                            {{$event->event_is_active == true ? 'Aktif' : 'Tidak Aktif'}}</td>
                        <td>
                            <a href="{{route('events.edit', $event->id)}}" class="btn btn-sm btn-info"><i
                                    class="mdi mdi-table-edit"></i>&nbsp;Edit</a>
                            <a href="javascript:void(0)" id="event-delete"
                                data-attr="{{route('events.destroy', $event->id)}}" data-name="{{$event->event_name}}"
                                class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i>&nbsp;Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('modal.page-event-modal')
@endsection

@push('scripts')
<script>
    $(document).on('click', '#event-delete', function(){
        $('#delete-event-modal').modal('show');
        var name = $(this).data('name');
        var attr = $(this).data('attr');
        $('#form-event-delete').attr('action', attr);
        $('.delete-title').text(name);
    });
</script>
@endpush