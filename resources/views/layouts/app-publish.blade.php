<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Indonesia Hijabfest Blog</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">

    {{-- bootstrap core --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> --}}
    {{-- style for this page --}}
    <link rel="stylesheet" href="{{asset('vendor/cloapedia/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/cloapedia/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/cloapedia/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/cloapedia/css/colors.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/cloapedia/css/style.css')}}">

    <style>
        .no-js #loader {
            display: none;
        }

        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }

        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(/img/Preloader_3.gif) center no-repeat #fff;
        }
    </style>
    @stack('styles')
</head>

<body>
    <div class="se-pre-con"></div>
    <div id="wrapper">
        @include('partials.publish-top-bar')
        @include('partials.publish-nav')
        @yield('content')
        @include('partials.publish-footer')
        <div class="dmtop">Scroll to Top</div>
    </div>
    {{-- script for this page --}}
    <script src="{{asset('vendor/cloapedia/js/jquery.min.js')}}"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
    {{-- bootstrap js core --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script> --}}
    <script src="{{asset('vendor/cloapedia/js/bootstrap.min.js')}}"></script>
    {{-- js for this page --}}
    <script src="{{asset('vendor/cloapedia/js/tether.min.js')}}"></script>
    <script src="{{asset('vendor/cloapedia/js/custom.js')}}"></script>
    <script>
        $(window).on('load', function() {
            setTimeout(function(){
                $(".se-pre-con").fadeOut("slow");
            }, 1000);
        });
    </script>
    @stack('scripts')

</body>

</html>