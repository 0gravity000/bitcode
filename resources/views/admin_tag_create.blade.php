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

            <form method="POST" action="/admin/tag/store">
                @csrf
                <div class="mb-3">
                    <label for="tag" class="form-label">タグ名</label>
                    <input type="text" class="form-control" name="tag">
                    <div class="form-text">タグ名を入力してください</div>
                </div>
                <button type="submit" class="btn btn-primary" name="btn" value="back">戻る</button>
                <button type="submit" class="btn btn-primary" name="btn" value="reg">登録</button>
            </form>

        </div> <!-- col -->
    </div> <!-- row -->
</div>  <!-- container -->
@endsection
