<header>
    <ul class="header">

        <li>
           <a href="/" class="logo">

               <img src="{{ asset('images/logo/logo.svg') }}" alt="logo">
               <h1>SAFQ</h1>

           </a>
        </li>

        <li>
            <form class="search" id="search" method="get" action="/">

                <img src="{{ asset('images/icons/search.svg') }}" alt="search">
                <input type="text" name="query" placeholder="Поиск..."/>

            </form>
        </li>

        <li>
            <div class="toots">

                @auth
                <a href="{{ route('create') }}"><img src="{{ asset('images/icons/add.svg') }}" alt="add"></a>
                @endauth
                <a href="#"><img src="{{ asset('images/icons/themes.svg') }}" alt="themes"></a>
                @guest
                    <a href="{{ route('signIn') }}" class="auth">Вход</a>
                    <a href="{{ route('signUp') }}" class="auth">Регистрация</a>
                @endguest

                @auth
                    <a href="">{{ Auth::user()->username }}</a>
                    <a href="{{ route('auth.logout') }}">Выход</a>
                @endauth

            </div>
        </li>

    </ul>
</header>
