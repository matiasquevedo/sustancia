<html>
    <head>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/full-width-pics.css')}}">  
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/dist/ui/trumbowyg.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.css')}}">
    </head>
    <body>
        @include('nav')
        @include('flash::message')
        @yield('header')
        <section>
            @yield('content')
            

        </section>
        <script src="{{asset('plugins/jquery/jquery.js')}}"></script>
        <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>
        <script src="{{asset('plugins/trumbowyg/dist/trumbowyg.js')}}"></script>
        <script src="{{asset('plugins/fontawesome/js/all.js')}}"></script>
        @yield('js')
    </body>

</html>