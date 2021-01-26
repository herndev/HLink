<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'HLink') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- jQuery -->
    <link rel="stylesheet" href="{{ secure_asset('mini_lib/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('mini_lib/css/animate.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('mini_lib/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('mini_lib/css/hover.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('mini_lib/css/ionicons.css') }}">


    <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    <h5>
                        <span class="text-orange font-weight-bold">H</span>Link
                    </h5>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <div class="nav-item nav-link active text-orange-light font-italic ion-email"> <span class="ml-2">herniejabien@yes.my</span> </div>
                        <span class="mx-2 nav-item nav-link active text-white md-hidden">|</span>
                        <div class="nav-item nav-link active text-orange-light font-italic ion-ios-telephone"> <span class="ml-2">09397724280</span> </div>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ secure_asset('mini_lib/js/jquery.min.js') }}"></script>
    <script src="{{ secure_asset('mini_lib/js/bootstrap.min.js') }}"></script>
    <script src="{{ secure_asset('mini_lib/js/jquery.form.js') }}"></script>
    <script src="{{ secure_asset('js/main.js') }}"></script>
</body>
</html>


