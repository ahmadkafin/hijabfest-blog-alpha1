@extends('layouts.apps')

@push('styles')
<s>
    .square {
    height: 50px;
    width: 50px;
    }
</s>
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
                <li class="breadcrumb-item"><a href="/admin/{{Request::segment(2)}}">{{Request::segment(2)}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{Str::of(request()->segment(3))->replace('-', ' ')}}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    @foreach($categories as $category_single)
                    <li class="nav-item">
                        <a class="nav-link {{Request::segment(3) == Str::slug($category_single->category_name, '-') ? 'active' : ''}}" href="{{route('categories.show', Str::slug($category_single->category_name, '-'))}}">{{$category_single->category_name}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="text-center">
                <h2 class="py-4">List kategori <span style="text-transform: uppercase;">{{Str::of(request()->segment(3))->replace('-', ' ')}}</span></h2>
                <span class="square bg-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</span><span> : Artikel belum tayang</span>
                &nbsp;&nbsp;&nbsp;
                <span class="square bg-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</span><span> : Artikel tayang</span>
            </div>
            <hr>
            <div class="card-body">
                <div class="row">
                    @foreach($categories_articles as $category)
                    @foreach($category->pivots as $articles)
                    <div class="col-4">
                        <div class="card text-center text-white {{$articles->article->article_status == false ? 'bg-danger' : 'bg-success'}}">
                            <div class="card-header" style="text-transform: uppercase;">
                                {{$articles->article->article_title}}
                            </div>
                            <?php
                            $div = '</div>';
                            ?>
                            <div class="card-body">
                                <p class="card-text">
                                    {!!Str::words($articles->article->article_content, 50) . $div!!}
                                </p>
                                <div class="my-3">
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                            <div class="card-footer text-white">
                                {{\Carbon\Carbon::parse($articles->article->created_at)->diffForHumans()}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


@push('scripts')
@endpush