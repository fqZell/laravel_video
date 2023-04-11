@extends('layout.layout')

@section('page_title', $video->title)

@section('content')

    <single>

        <div class="video_single">

            <video src="{{ $video->video_url }}" controls></video>

            <div class="video_single-body">

                <div class="video_single-header">

                    <p class="video_single-author">Название видео: {{ $video->title }}</p>
                    <div class="video_single-status">
                        <p class="video_single-view"><i class="fa-solid fa-eye"></i>{{ $video->view_count }}</p>
                        <p type="submit" class="video_single-like"><i class="fa-regular fa-heart"></i></p>
{{--                        <form method="POST" action="{{ route('video.like', ['video' => $video->id]) }}">--}}
{{--                            @csrf--}}
{{--                            <button type="submit">{{ $video->likeButton() }}</button>--}}
{{--                        </form>--}}
{{--                        <p>{{ $video->likes()->count() }} likes</p>--}}
                    </div>

                </div>

                <div class="video_single-main">

                    <div class="video_single-description">Описание видео: {{ $video->description }}</div>

                    <div class="video_single-author">
                        <img src="{{ $video->author()->image_url }}" alt="">
                        {{ $video->author()->username }}
                    </div>

                </div>

            </div>

        </div>

        @auth
            @if(Auth::user()->role === 'admin' || Auth::user()->id === $video->author_id)
                <a href="{{ route('video.delete', $video) }}">
                    Удалить видео
                </a>
                <a href="{{ route('video.update', $video) }}">
                    Редактировать видео
                </a>
            @endif
        @endauth

        <div class="comments">

            @auth

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <form method="post" action="{{ route('comment.store') }}" class="form-comment">
                    @csrf

                    <div class="form-group">
                        <label for="">
                            Оставить комментарий
                        </label>

                        <textarea name="text" cols="20" rows="3"></textarea>
                    </div>

                    <input type="hidden" name="video_id" value="{{ $video->id }}">

                    <button>Добавить комментарий</button>
                </form>
            @endauth

            <ul class="list">
                @foreach($video->comments() as $comment)
                    <li>
                        <h3 class="author">{{ $comment->user()->username }}</h3>
                        <p class="text">{{ $comment->text }}</p>
                        <time>{{ $comment->created_at->format('M d, Y') }}</time>
                    </li>
                @endforeach
            </ul>

        </div>

    </single>

@endsection
