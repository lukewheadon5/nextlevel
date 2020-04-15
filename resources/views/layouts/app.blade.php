<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Next Level') }}</title>

    <!-- Scripts -->
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" >
        <nav class="navbar navbar-expand-md shadow-sm" >
            <div class="container" >
                <a class="navbar-brand" href="{{ url('/') }}" style="color:#000000">
                    Next Level
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    @guest 
                    @if (route::has('register'))
                    @endif
                    @else 
                    @if (Auth::user()->profile()->exists() == true)
                    <li class="nav-item dropdown"> 
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" style="color:#000000" aria-expanded="false" v-pre>
                                    Teams <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('myTeams') }}">My Teams</a>
                                    <a class="dropdown-item" href="{{ route('team.index') }}">All Teams</a>
                                    <a class="dropdown-item" href="{{ route('team.create') }}">Create a Team</a>
                                    
                                </div>
                           </li>
                    @endif
                        @endguest

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
                                @if (Auth::user()->profile()->exists() == true)
                                <li class="nav-item">
                                @if(empty(Auth::user()->profile->image ))
                                    <img src="/images/blankPhoto.png" alt="Profile Picture" 
                                    width="40px" height="40px" class="rounded-circle"/> 
                                @else
                                    <img src="{{asset('images/'. Auth::user()->profile->image)}}" alt="Profile Picture" 
                                    width="40px" height="40px" class="rounded-circle"/> 
                                            
                                @endif
                                </li>
                                @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" style="color:#000000" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                @if (Auth::user()->profile()->exists() == false)
                                    <a class="dropdown-item" href="{{ route('profile.create') }}">Create Profile</a>
                                    @endif
                                    @if (Auth::user()->profile()->exists() == true)
                                    <a class="dropdown-item" href="{{ route('profile.show', auth()->user()->profile()->value('id') ) }}">Profile</a>
                                    
                                    @endif

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

        @if ($errors->any())
    <div class="alert alert-danger">
        <strong>oops!</strong> There are problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('danger'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
