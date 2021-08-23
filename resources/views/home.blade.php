@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
        <!-- navibar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Menu</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            @if ( Auth::user()->name == 'admin')
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown-sub" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        管理者メニュー
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown-sub">
                        <a class="dropdown-item" href="/language">
                            言語の一覧を表示
                        </a>
                    </div>
                </li>
            </ul>
            </div>
            @endif
        </nav>
        </div> <!-- col -->
    </div> <!-- row -->
    <div class="row">
        <div class="col-3">
        <!-- leftsidebar -->
            <p>言語</p>
            @foreach ($languages as $language)
                <a href="#">{{ $language->name }}</a>
            @endforeach
            <hr>
            <p>タグ</p>
            @foreach ($tags as $tag)
                <a href="#">{{ $tag->name }}</a>
            @endforeach
        </div> <!-- col -->
        <div class="col">
        <!-- main content -->
            コンテンツ
        </div> <!-- col -->
    </div> <!-- row -->
</div>  <!-- container -->
@endsection
