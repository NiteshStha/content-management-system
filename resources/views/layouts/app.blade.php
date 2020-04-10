<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="https://kit.fontawesome.com/1c9bbf8add.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item p-2 pl-4" href="{{ route('users.edit-profile') }}">
                                    My Profile
                                </a>

                                <a class="dropdown-item p-2 pl-4" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @auth
            <div class="container">
                @if (session()->has('success'))
                    <div id="flash" class="alert alert-success d-flex align-items-center justify-content-between">
                        {{ session()->get('success') }}

                        @if (session()->get('success') != null)
                            <div class="btn btn-success btn-sm" onclick="dismiss()">Dismiss</div>
                        @endif
                    </div>
                @endif

                @if (session()->has('error'))
                    <div id="flash" class="alert alert-danger d-flex align-items-center justify-content-between">
                        {{ session()->get('error') }}

                        @if (session()->get('error') != null)
                            <div class="btn btn-danger btn-sm" onclick="dismiss()">Dismiss</div>
                        @endif
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group">
                            @if (auth()->user()->isAdmin())
                                <li class="list-group-item">
                                    <a href="{{ route('users.index') }}">Users</a>
                                </li>
                            @endif
                            <li class="list-group-item">
                                <a href="{{ route('posts.index') }}">Posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('categories.index') }}">Categories</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('tags.index') }}">Tags</a>
                            </li>
                        </ul>

                        <ul class="list-group mt-5">
                            <li class="list-group-item">
                                <a href="{{ route('posts.trashed') }}">Trashed Posts</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-8">
                        @yield('content')
                    </div>
                </div>
            </div>

            @else
            @yield('content')

            @endauth


        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    @yield('scripts')
    <script>
        function dismiss(){
            const flash = document.getElementById('flash');
            flash.setAttribute('class', 'd-none');
        }
    </script>
</body>

</html>
