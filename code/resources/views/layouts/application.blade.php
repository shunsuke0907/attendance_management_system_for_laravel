<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF トークン --}}
        <meta name="csrf-token" content={{ csrf_token() }}>

        <title>
            @isset($headTitle){{ $headTitle }} |@endisset 勤怠システム
        </title>

        {{-- CSS --}}
        <link rel="stylesheet" type="text/css" href={{ asset('css/app.css') }}>
        <link rel="stylesheet" type="text/css" href={{ asset('css/custom.css') }}>
        <!--[if lt IE 9]>
            <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js">
            </script>
        <![endif]-->
    </head>

    <body class="padding_top_5_5_rem">
        @include('layouts._header')

        <div class="container">
            @include('layouts._flash_message')

            @yield('content')
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
