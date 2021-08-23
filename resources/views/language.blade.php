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
            <admin-navi></admin-navi>
            @endif
        </nav>
        </div> <!-- col -->
    </div> <!-- row -->
    <div class="row">
        <div class="col">
            <!-- エラー表示 -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <a href="/language/create">新規作成</a>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">プログラミング言語</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($languages as $language)
                <tr>
                <th scope="row">{{ $language->id }}</th>
                <td><a href="/language/show/{{ $language->name }}">{{ $language->name }}</a></td>
                <td><a href="/language/destroy/{{ $language->name }}">削除</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>

        </div> <!-- col -->
    </div> <!-- row -->
</div>  <!-- container -->
@endsection
