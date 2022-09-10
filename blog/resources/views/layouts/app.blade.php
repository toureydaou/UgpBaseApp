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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script type="text/javascript" src="{{asset('DataTables/datatables.js')}}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.css')}}"/>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                    @if(Auth::user()->profil === 'Admin')
                    <ul class="navbar-nav ms-5">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{__('Gestion des prescripteurs')}}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right p-1" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item p-2" href="{{ route('inscription') }}">
                                    {{__('Inscription d \'un prescripteur')}}
                                </a>

                                <a class="dropdown-item p-2" href="{{ route('prescripteurs.index') }}">
                                    {{__('Liste des prescripteurs')}}
                                </a>

                            </div>
                        </li>
                    </ul>


                    <ul class="navbar-nav ms-5">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{__('Gestion des sites')}}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right p-1" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item p-2" href="{{ route('site.create') }}">
                                    {{__('Création d\'un site')}}
                                </a>

                                <a class="dropdown-item p-2" href="{{ route('site.index') }}">
                                    {{__('Liste des sites')}}
                                </a>

                            </div>
                        </li>

                    </ul>
                    @endif
                    @endauth


                    @auth
                    @if(Auth::user()->profil === 'Prescripteur' || Auth::user()->profil === 'Admin')
                    <ul class="navbar-nav ms-5">
                        <li class="nav-item">
                            <a id="navbarDropdown" class="nav-link" href="{{ route('creationPrescripteur')}}">
                                {{__("Mes informations")}}
                            </a>
                        </li>

                    </ul>
                    @endif
                    @endauth


                    @auth
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->email }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Déconnexion') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    @endauth

                </div>
            </div>
        </nav>

        <main class="py-4">
            @include('flash-messages.templates')

            @yield('content')
        </main>
    </div>
</body>
<script src="{{ asset('js/ajax.js') }}" async></script>
</html>
