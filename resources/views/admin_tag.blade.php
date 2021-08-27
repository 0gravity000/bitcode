@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
        <!-- navibar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <admin-tag-navi></admin-tag-navi>
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

            <a href="/admin/tag/create">新規作成</a>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">タグ</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                <th scope="row">{{ $tag->id }}</th>
                <td><a href="/admin/tag/show/{{ $tag->name }}">{{ $tag->name }}</a></td>
                <td><a href="/admin/tag/destroy/{{ $tag->name }}">削除</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>

        </div> <!-- col -->
    </div> <!-- row -->
</div>  <!-- container -->
@endsection
