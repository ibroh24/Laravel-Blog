<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Blog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
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
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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
            <div class="container">
                <div class="row">
                    @if (Auth::check())                    
                    <div class="col-lg-2">
                        <ul class="list-group">
                            <li class="list-group-item">
                            <a href="{{ route('home') }}">Home</a>
                            </li>

                             @if (Auth::user()->admin)
                                <li class="list-group-item">
                                    <a href="{{ route('user.create') }}">Create New User</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('user.index') }}">View All Users</a>
                                </li>
                             @endif
                             <li class="list-group-item">
                                <a href="{{ route('profile.index') }}">My Profile</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('category.create') }}">Create New Category</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('category.index') }}">View All Category</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('post.create') }}">Create New Post</a>    
                            </li>
                             <li class="list-group-item">
                                <a href="{{ route('post.index') }}">View All Post</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('post.trashed') }}">View All Trash Posts</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('tag.index') }}">View Tags</a>    
                            </li>
                             <li class="list-group-item">
                                <a href="{{ route('tag.create') }}">Create New Tag</a>
                            </li>
                            @if (Auth::user()->admin)
                                <li class="list-group-item">
                                    <a href="{{ route('setting.index') }}">Site Settings</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    @endif
                        <div class="col-lg-10">
                            @yield('content')
                        </div>
                </div>
            </div>

        </main>
    </div>

    <script src="{{ asset('js/toastr.min.js') }}"></script>
    {{-- <script> --}}
        @if(Session::has('success'))
           <script>toastr.success("{{ Session::get('success') }}");</script>
        @endif
        @if(Session::has('info'))
           <script>toastr.success("{{ Session::get('info') }}"); </script>
        @endif
{{-- </script> --}}
</body>
</html>


