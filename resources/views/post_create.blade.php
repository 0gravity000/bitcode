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

            <form method="POST" action="/post/store">
                @csrf
                <button type="submit" class="btn btn-primary" name="btn" value="back">戻る</button>
                <button type="submit" class="btn btn-primary" name="btn" value="reg">登録</button>
                <div class="form-group">
                    <label for="title" class="form-label">タイトル</label>
                    <input type="text" class="form-control" name="title">
                    <div class="form-text">タイトル名を入力してください</div>
                </div>
                <div class="form-group">
                    <label for="code">コード</label>
                    <textarea class="form-control" name="code" rows="10"></textarea>
                    <div class="form-text">コードを入力してください</div>
                </div>
                <div class="form-group">
                    <label for="tag">タグ</label><br>
                    @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="Checkbox{{ $tag->id }}" value="{{ $tag->id }}">
                        <label class="form-check-label" for="Checkbox{{ $tag->id }}">{{ $tag->name }}</label>
                    </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="note1">備考</label>
                    <textarea class="form-control" name="note1" rows="3"></textarea>
                    <div class="form-text">備考を入力してください</div>
                </div>
                <button type="submit" class="btn btn-primary" name="btn" value="back">戻る</button>
                <button type="submit" class="btn btn-primary" name="btn" value="reg">登録</button>
            </form>

        </div> <!-- col -->
    </div> <!-- row -->
</div>  <!-- container -->
@endsection
