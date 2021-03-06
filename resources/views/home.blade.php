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
                            <button type="button" class="btn btn-primary">投稿する</button>
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
                <button type="button" class="btn btn-outline-success my-1 mx-1">
                <a href="/home/{{$tag->name}}">{{ $tag->name }}</a>
                </button>
            @endforeach
        </div> <!-- col -->
        <div class="col">
            <!-- main content -->
            <post :posts={{$posts}} :authuserid={{Auth::user()->id}}></post>
        </div> <!-- col -->
    </div> <!-- row -->
</div>  <!-- container -->
@endsection
