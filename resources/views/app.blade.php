<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@@yossy2580" />
    <meta property="og:url" content="yossy-portfolio.com" />
    <meta property="og:title" content="Yossy Portfolio" />
    <meta property="og:description" content="ポートフォリオです" />
    <meta property="og:image" content="images/business-1209705_640.jpg" />

    @if (app('env') === 'local')
        <!-- Reset CSS -->
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico.jpg') }}">
    @endif

    @if (app('env') === 'production')
        <!-- Reset CSS -->
        <link href="{{ secure_asset('css/reset.css') }}" rel="stylesheet">
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ secure_asset('img/favicon.ico.jpg') }}">
    @endif

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">

    @if (app('env') === 'local')
        <!-- Base CSS -->
        <link href="{{ asset('css/base.css') }}" rel="stylesheet">
        <!-- Style CSS -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    @endif

    @if (app('env') === 'production')
        <!-- Base CSS -->
        <link href="{{ secure_asset('css/base.css') }}" rel="stylesheet">
        <!-- Style CSS -->
        <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
    @endif
</head>

<body>
    <div id="app">
        @yield('content')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
    </script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js">
    </script>
</body>

</html>
