@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
        <!-- navibar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/home">ホーム</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/post/create">
                            <button type="button" class="btn btn-outline-primary">投稿する</button>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>

            @if ( Auth::user()->name == 'admin')
            <admin-navi></admin-navi>
            @endif
        </nav>
        </div> <!-- col -->
    </div> <!-- row -->
    <div class="row">
        <div class="col-3">
        <!-- leftsidebar -->
            <p>タグ</p>
            @foreach ($tags as $tag)
                <a href="#">{{ $tag->name }}</a>
            @endforeach
        </div> <!-- col -->
        <div class="col">
            <!-- main content -->
            @foreach ($posts as $post)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        @foreach ($post->tags as $tag)
                        {{ $tag->name }}
                        @endforeach
                    </h6>
                    <p class="card-text">{{ $post->code }}</p>
                    <a href="#" class="card-link">もっと見る</a>
                </div>
            </div>
            @endforeach
        </div> <!-- col -->
    </div> <!-- row -->
</div>  <!-- container -->
@endsection
