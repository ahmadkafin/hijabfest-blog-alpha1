@extends('layouts.apps')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endpush
@section('content')
<div class="row">
    <div class="col-6 py-5">
        <h4>Tambah artikel baru</h4>
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

<div class="">
    <div class="row">
        <div class="col-md-12 py-5">
            <form action="/admin/articles/store" method="POST" enctype="multipart/form-data" id="thisform">
                @csrf
                <div class="mb-3">
                    <label for="article-title" class="form-label">Judul Artikel</label>
<input type="text" name="article_title" class="form-control @error('article_title') is-invalid @enderror"
                        id="article-title" aria-describedby="article-title" autofocus value="{{Request::old('article_title')}} ">
                    <small id="article-title" class="form-text">Masukan judul artikel</small>
                    @error('article_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="article-slug" class="form-label">Slug</label>
<input type="text" name="article_slug" class="form-control @error('article_slug') is-invalid @enderror"
                                    id="article-slug" value="{{Request::old('article_slug')}} ">
                                <small id="article-slug" class="form-text">slug / url artikel kamu</small>
                                @error('article_slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div id="kategori" class="col-md-6 form-group typehead">
                            <div class="mb-3">
                                <label for="categories" class="form-label">Kategori</label>
<select id="categories" multiple class="form-control" name="category_name[]" data-live-search="true">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="article-content" class="form-label">
                        Isi artikel kamu
                    </label>
                    <textarea id="summernote" name="article_content">{{Request::old('article_content')}}</textarea>
                    @error('article_content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="article-url-video">Ada video?</label>
                                <input type="text" class="form-control @error('article_url_video')
                                    is-invalid
@enderror" id="article-url-video" name="article_url_video"
                                    value="{{Request::old('article_url_video')}}" />
                                <small id="article-url-video" class="form-text">url video kamu</small>
                                @error('article_url_video')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="article-video-embeed">Ingin menampilkan videonya?</label>
                                <input type="text" name="article_video_embeed" class="form-control @error('article_video_embeed')
                                    is-invalid
@enderror" id="article-video-embeed"
                                    value="{{Request::old('article_video_embeed')}}" />
                                <small id="article-video-embeed" class="form-text">Embed video kamu disini</small>
                                @error('article_video_embeed')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <input type="file" name="file" id="fie">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script src="{{asset('js/bootstrap-tagsinput.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,
        });
        $('#kat-baru').val();
    });

    $('#categories').selectpicker();
    $('#article-title').change(function(e) {
        $.get(
            '{{route("cekslug")}}', {
                'article_title': $(this).val()
            },
            function(data) {
                $('#article-slug').val(data.slug);
            }
        );
    });
</script>
@endpush