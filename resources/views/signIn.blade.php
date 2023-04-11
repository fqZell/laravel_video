@extends('layout.layout')

@section('page_title', 'SignIn Page')

@section('content')

    <div class="page_auth">

        <h2 class="title">Авторизация</h2>

        <form action="{{ route('auth.signIn') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="email">Введите почту:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Введите пароль:</label>
                <input type="password" name="password" id="password">
            </div>

            <button class="button">Авторизация</button>
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
