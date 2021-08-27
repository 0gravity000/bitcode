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
                <button type="button" class="btn btn-outline-success my-1 mx-1">
                <a href="/main/{{$tag->name}}">{{ $tag->name }}</a>
                </button>
            @endforeach
        </div> <!-- col -->
        <div class="col">
            <!-- main content -->
            <post :posts={{$posts}}></post>
        </div> <!-- col -->
    </div> <!-- row -->
</div>  <!-- container -->
@endsection
