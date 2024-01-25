<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style type="text/css">
        html {
            height: 100%;
        }

        body {
            margin: 0px;
            height: 100%;
        }
    </style>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://api.sphere.gistda.or.th/map/?key=3426D75BA27040E7B5C1198055B4389A"></script>
    <script>
        var map

        function init() {

            map = new sphere.Map({
                placeholder: document.getElementById('map'),
                center: [-120, 50],
                zoom: 2
            });

            map.Event.bind("ready", function(location) {
                map.Layers.add(
                    new sphere.Layer({
                        sources: {
                            earthquakes: {
                                type: "excel",
                                data: "example.xlsx",
                            },
                        },
                        layers: [{
                                id: "earthquakes-heat",
                                type: "heatmap",
                                source: "earthquakes",
                                maxzoom: 9,
                                paint: {
                                    // Increase the heatmap weight based on frequency and property magnitude
                                    "heatmap-weight": [
                                        "interpolate",
                                        ["linear"],
                                        ["get", "mag"],
                                        0,
                                        0,
                                        6,
                                        1,
                                    ],
                                    // Increase the heatmap color weight weight by zoom level
                                    // heatmap-intensity is a multiplier on top of heatmap-weight
                                    "heatmap-intensity": [
                                        "interpolate",
                                        ["linear"],
                                        ["zoom"],
                                        0,
                                        1,
                                        9,
                                        3,
                                    ],
                                    // Color ramp for heatmap.  Domain is 0 (low) to 1 (high).
                                    // Begin color ramp at 0-stop with a 0-transparancy color
                                    // to create a blur-like effect.
                                    "heatmap-color": [
                                        "interpolate",
                                        ["linear"],
                                        ["heatmap-density"],
                                        0,
                                        "rgba(33,102,172,0)",
                                        0.2,
                                        "rgb(103,169,207)",
                                        0.4,
                                        "rgb(209,229,240)",
                                        0.6,
                                        "rgb(253,219,199)",
                                        0.8,
                                        "rgb(239,138,98)",
                                        1,
                                        "rgb(178,24,43)",
                                    ],
                                    // Adjust the heatmap radius by zoom level
                                    "heatmap-radius": [
                                        "interpolate",
                                        ["linear"],
                                        ["zoom"],
                                        0,
                                        2,
                                        9,
                                        20,
                                    ],
                                    // Transition from heatmap to circle layer by zoom level
                                    "heatmap-opacity": [
                                        "interpolate",
                                        ["linear"],
                                        ["zoom"],
                                        7,
                                        1,
                                        9,
                                        0,
                                    ],
                                },
                            },
                            "waterway-label",
                        ],
                    })
                );
            });
        }
    </script>
</head>


<body onload="init();">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            @yield('content')
        </main>
    </div>

    <div id="map" style="height: 100%;">

    </div>
</body>

</html>
