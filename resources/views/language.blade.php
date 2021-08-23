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
        </nav>
        </div> <!-- col -->
    </div> <!-- row -->
    <div class="row">
        <div class="col">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">プログラミング言語</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($languages as $language)
                <tr>
                <th scope="row">{{ $language->id }}</th>
                <td><a href="#">{{ $language->name }}</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div> <!-- col -->
    </div> <!-- row -->
</div>  <!-- container -->
@endsection
