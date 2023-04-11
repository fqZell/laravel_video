@extends('layout.layout')

@section('page_title', 'CreateVideo Page')

@section('content')

    <div class="page_auth">

        <h2 class="title">Добавление видео на сайт</h2>

        <form action="{{ route('video.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Введите название:</label>
                <input type="text" name="title" id="title">
            </div>

            <div class="form-group">
                <label for="description">Введите описание видео:</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="poster">Добавьте постер:</label>
                <input type="file" name="poster" id="poster">
            </div>

            <div class="form-group">
                <label for="video_path">Добавьте видео:</label>
                <input type="file" name="video_path" id="video_path">
            </div>

            <br/>

            <button class="button">Добавить</button>
        </form>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif

    </div>

@endsection
