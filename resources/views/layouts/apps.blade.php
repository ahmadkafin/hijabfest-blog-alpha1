<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name', 'IHF')}}</title>
    {{-- bootstrap core --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    {{-- this page style --}}
    <link rel="stylesheet" href="{{asset('css/golbal-styles.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/label/assets/vendors/iconfonts/mdi/css/materialdesignicons.css')}}">
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

<body class="header-fixed">
    <div class="se-pre-con"></div>
    @include('partials.nav')
    <div class="page-body">
        @include('partials.sidebar')
        <div class="page-content-wrapper">
            <div class="">
                <div class="content-viewport">
                    @yield('content')
                </div>
            </div>
            {{-- footer --}}
            <footer class="footer" style="max-width: 100%">
                <div class="row">
                    <div class="col-sm-6 text-center text-sm-right order-sm-1">
                        <ul class="text-gray">
                            <li><a href="#">Terms of use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
                        <small class="text-muted d-block">Copyright © 2019 <a href="http://www.uxcandy.co"
                                target="_blank">UXCANDY</a>. All rights reserved</small>
                        <small class="text-gray mt-2">Handcrafted With <i class="mdi mdi-heart text-danger"></i></small>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- bootstrap 5 core --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    {{-- this page script --}}
    <script src="{{asset('vendor/label/assets/vendors/js/core.js')}}"></script>
    <script src="{{asset('vendor/label/assets/vendors/js/core.js')}}"></script>
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