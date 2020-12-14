@extends('layouts.apps')

@section('content')
<div class="row">
    <div class="col-6 py-5">
        <h4>Dashboard</h4>
        <p class="text-gray">Page Articles, {{Auth::user()->name}}</p>
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
            <a href="/admin/articles/create" class="btn btn-success">Tambah artikel</a>
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
    <div class="col-12 item-wrapper">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Kategori</th>
                        <th>URL video</th>
                        <th>Embeed Video?</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @if ($articles->isEmpty())
                    <tr>
                        <td colspan="8" class="text-center bg-black">Data kosong, isi artikel kamu dulu yu. <a
                                href="/admin/articles/create" class="btn btn-success btn-xs">Tambah artikel</a></td>
                    </tr>
                    @else
                    @foreach ($articles as $article)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{Str::words($article->article_title, 2)}}</td>
                        <td>{{Str::limit($article->article_slug, 20)}}</td>
                        <td>{!!($article->article_status == false ? '<label class="badge badge-danger">Belum
                                tayang</label>' : '<label class="badge badge-success">Tayang</label>')!!}
                        </td>
                        <td>
                            @if ($article->pivots->isEmpty())
                            <label class="badge badge-danger">Belum Mempunyai kategori</label>
                            @else
                            @foreach ($article->pivots as $categories)
                            <label class="badge badge-info">{{$categories->categories->category_name}}</label>
                            @endforeach
                            @endif
                        </td>
                        <td>
                            <label class="badge badge-info badge-pill" data-toggle="tooltip" data-placement="top"
                                title="{{($article->article_url_video == null ? 'No Video' : $article->article_url_video)}}">
                                {{($article->article_url_video == null ? 'No Video' : Str::limit($article->article_url_video, 15))}}
                            </label>
                        </td>
                        <td>
                            <a href="javascript:void(0)" id="video-embed"
                                data-embed="{{$article->article_video_embeed}}" class="btn btn-sm btn-warning">
                                <i class="mdi mdi-eye"></i>&nbsp;
                                {{($article->article_video_embeed == null ? 'Tidak Embeed' : 'Embeed')}}
                            </a>
                        </td>
                        <td>
                            <a href="{{url('/admin/articles/edit', $article->id)}}" class="btn btn-info btn-sm"><i
                                    class="mdi mdi-table-edit"></i>&nbsp;Edit</a>
                            <a href="javascript:void(0)" data-attr="{{route('deletes', $article->id)}}"
                                data-title="{{$article->article_title}}" class="btn btn-danger btn-sm delete"
                                id="delete-modal"><i class="mdi mdi-delete"></i>&nbsp; Delete</a>

                            <a href="{{url('/admin/articles/show', $article->article_slug)}}"
                                class="btn btn-warning btn-sm"><i class="mdi mdi-eye"></i>&nbsp; View</a>
                            <a href="{{url('/admin/articles/publish', $article->id)}}"
                                class="btn {{$article->article_status == false ? 'btn-success' : 'btn-danger'}} btn-sm"><i
                                    class="mdi mdi-projector-screen"></i>&nbsp;
                                {{$article->article_status == false ? 'Publish' : 'Un-Publish'}}</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('iframe').addClass('embed-responsive-item')
    })

    $(document).on('click', '#delete-modal', function(){
        $('#delete-modal').modal('show');
        let url = $(this).data('attr');
        var title = $(this).data('title');
        $('#form-delete').attr('action', url);
        $('#delete-title').text(title);
    });

    $(document).on('click', '#video-embed', function(){
        $('#embed-modal').modal('show');
        let embed = $(this).data('embed');
        $('#embed-video').html(embed);
    });

    $("#embed-modal").on('hidden.bs.modal', function (e) {
        $("#embed-modal iframe").attr("src", $("#embed-modal iframe").attr("src"));
    });
</script>
@endpush

@include('modal.page-article-modal');