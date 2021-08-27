@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
        <!-- navibar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                @auth
                <a class="navbar-brand" href="/home">ホームへ戻る</a>
                @else
                <a class="navbar-brand" href="/main">ホーム（ゲスト）へ戻る</a>
                @endauth
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            @auth
                @if ( Auth::user()->name == 'admin')
                <admin-navi></admin-navi>
                @endif
            @endauth
        </nav>
        </div> <!-- col -->
    </div> <!-- row -->
    <div class="row">
        <div class="col-3">
        <!-- leftsidebar -->
            <p>タグ</p>
            @foreach ($tags as $tag)
            <button type="button" class="btn btn-outline-success my-1 mx-1">
                @auth
                <a href="/home/{{$tag->name}}">{{ $tag->name }}</a>
                @else
                <a href="/main/{{$tag->name}}">{{ $tag->name }}</a>
                @endauth
            </button>
            @endforeach
        </div> <!-- col -->
        <div class="col">
            <!-- main content -->
            @auth
            <post-show :post={{$post}} :authuserid={{Auth::user()->id}}></post-show>
            @else
            <post-show :post={{$post}} :authuserid="0"></post-show>
            @endauth
        </div> <!-- col -->
    </div> <!-- row -->
</div>  <!-- container -->
@endsection
