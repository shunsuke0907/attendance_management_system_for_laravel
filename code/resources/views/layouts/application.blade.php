<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF トークン --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @isset($headTitle){{ $headTitle }} |@endisset 勤怠システム
        </title>

        {{-- CSS --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.scss') }}" rel="stylesheet">

        <!--[if lt IE 9]>
            <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js">
            </script>
        <![endif]-->
    </head>

    <body>
        @include('layouts.header')

        <div class="container">
            @include('layouts.flash_message')

            @yield('content')
        </div>
    </body>
</html>
