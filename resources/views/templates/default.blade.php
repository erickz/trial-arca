<html>
    <head>
        <title>Arca Trial - @yield('titlePage')</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/solid.min.css" />
        <link href="{{ asset('assets/css/bootstrap.css') }}" type="text/css" rel="stylesheet" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div class="container">
            <div class="row">
                &nbsp;
                <h2 class='text-center mb-5'>Business Finder</h2>

                @yield('content')
            </div>
        </div>

        <script src="{{ asset('assets/js/bootstrap.js') }}" type="text/javascript"></script>
    </body>
</html>
