@extends('layout.layout')

@section('page_title', 'CreateVideo Page')

@section('content')

    @auth

        @if( Auth::user()->role === 'admin' || Auth::user()->id === $video->author_id )

    <div class="page_auth">

        <h2 class="title">Редактирование видео на сайте</h2>

        <form action="{{ route('video.update', $video) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Введите новое название:</label>
                <input type="text" name="title" id="title" value="{{ $video->title }}">
            </div>

            <div class="form-group">
                <label for="description">Введите новое описание видео:</label>
                <textarea name="description" id="description" cols="30" rows="10">{{ $video->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="poster">Добавьте новый постер:</label>
                <input type="file" name="poster" id="poster">
            </div>

            <div class="form-group">
                <label for="video_path">Добавьте новое видео:</label>
                <input type="file" name="video_path" id="video_path">
            </div>

            <button class="button">Редактировать</button>
        </form>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif

    </div>

    @else

            @php
               return redirect()->route('home');
            @endphp

        @endif

    @endauth

@endsection
