@extends('layouts.apps')

@push('styles')
<link rel="stylesheet" href="{{asset('css/dropzone.css')}}">
@endpush

@section('content')
<div class="row">
    <div class="col-6 py-5">
        <h4>Tambah event baru</h4>
        <p class="text-gray">Page Articles, {{Auth::user()->name}}</p>
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
    <div class="col-md-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/{{Request::segment(2)}}">{{Request::segment(2)}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{Request::segment(3)}}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-6 py-5 mx-auto">
        <form action="{{route('events.update', $event->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="event name">Nama event</label>
                <input type="text" id="event-name" name="event_name"
                    class="form-control @error('event_name') is-invalid @enderror" aria-describedby="event_name"
                    autofocus value="{{$event->event_name}}" />
                <small id="event_name" class="form-text">Masukan nama event</small>
                @error('event_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="event name">Slug url</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text" style="background-color: #e9ecef;">indonesiahijabfest.id/events/
                        </div>
                    </div>
                    <input type="text" readonly id="event-slug" name="event_slug"
                        class="form-control @error('event_slug') is-invalid @enderror" aria-describedby="event_name"
                        value="{{$event->event_slug}}" />
                </div>
                <small id="event_slug" class="form-text">Slug event kamu</small>
                @error('event_slug')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="event desc">Deskripsi Event</label>
                <div class="input-group mb-2">
                    <input type="text" id="event-desc" name="event_desc"
                        class="form-control @error('event_desc') is-invalid @enderror" aria-describedby="event_desc"
                        value="{{$event->event_desc}}">
                    <div class="input-group-prepend">
                        <div class="input-group-text" style="background-color: #e9ecef;"><small id="counter"
                                class="text-success">100</small>
                        </div>
                    </div>
                </div>
                <small id="event_desc" class="form-text">Masukan deskripsi event</small>
                @error('event_desc')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="event desc">Cover event</label>
                <div class="custom-file">
                    <input type="file" name="event_cover"
                        class="custom-file-input @error('event_cover') is-invalid @enderror"
                        aria-describedby="event_desc" value="{{Request::old('event_cover')}}" id="event-cover">
                    <label class="custom-file-label" for="event-cover">Choose file</label>
                </div>

                <small id="event_desc" class="form-text">Apakah ada cover?</small>
                @error('event_cover')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="akif event">Event aktif?</label>
                <div class="form-inline">
                    <div class="radio"><label> <input type="radio" name="event_is_active" class="form-check-input"
                                value="1" {{$event->event_is_active == 1 ? 'checked' : ''}}> Aktif Event <i
                                class="input-frame"></i></label></div>
                    <div class="radio"><label> <input type="radio" name="event_is_active" class="form-check-input"
                                value="0" {{$event->event_is_active == 0 ? 'checked' : ''}}> Non-aktif Event <i
                                class="input-frame"></i></label></div>
                </div>
                <small id="event_desc" class="form-text">Apakah kamu mau langsung mengkatifkan event?</small>
                @error('event_is_active')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <div class="mx-auto">
                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                    <button type="button" class="btn btn-danger btn-sm" id="btnBack">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{asset('js/dropzone.js')}}"></script>
<script>
    $(document).ready(function(){
            $(document).on('keydown', '#event-desc', function(){
            $(this).prop('maxlength', 100);
            var char = $(this).val().length;
            $('#counter').text(100 - char);
            if(char == 85 && char <= 85) {
                $('#counter').removeClass('text-success');
                $('#counter').addClass('text-danger');
            } else if(char == 0) {
                $('#counter').removeClass('text-danger');
                $('#counter').addClass('text-success');
            }
        });

        $('#event-cover').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });

        var files = "{{$event->event_cover}}";
        $('#event-cover').next('.custom-file-label').html(files);
        
    });

    document.getElementById('btnBack').onclick = function() {
        var link = '/admin/events';
        location.href = link;
    }

    $('#event-name').change(function(e) {
        $.get(
            '{{route("getSlugs")}}', {
                'event_name': $(this).val()
            },
            function(data) {
                $('#event-slug').val(data.slugs);
            }
        );
    });


</script>
@endpush