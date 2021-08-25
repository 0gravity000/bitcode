@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
        <!-- navibar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/main">ホーム（ゲスト）</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            </div>
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
