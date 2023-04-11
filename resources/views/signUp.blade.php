@extends('layout.layout')

@section('page_title', 'SignUp Page')

@section('content')

    <div class="page_auth">

        <h2 class="title">Регистрация</h2>

        <form action="{{ route('auth.signUp') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="email">Введите почту:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="username">Введите логин:</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}">
            </div>

            <div class="form-group">
                <label for="password">Введите пароль:</label>
                <input type="password" name="password" id="password">
            </div>

            <div class="form-group">
                <label for="password">Повторите пароль:</label>
                <input type="password" name="re_password" id="password">
            </div>

            <div class="form-group">
                <label for="photo">Добавьте аватар:</label>
                <input type="file" name="photo" id="photo">
            </div>

            <br/>

            <button class="button">Регистрация</button>
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
