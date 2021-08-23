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

            <form method="POST" action="/language/update">
                @csrf
                <div class="mb-3">
                    <label for="language" class="form-label">プログラミング言語名</label>
                    <input type="text" class="form-control" name="lang" value="{{ $language->name }}">
                    <div class="form-text">プログラミング言語名を入力してください</div>
                </div>
                <input type="hidden" class="form-control" name="id" value="{{ $language->id }}">
                <button type="submit" class="btn btn-primary" name="btn" value="back">戻る</button>
                <button type="submit" class="btn btn-primary" name="btn" value="update">更新</button>
            </form>

        </div> <!-- col -->
    </div> <!-- row -->
</div>  <!-- container -->
@endsection
