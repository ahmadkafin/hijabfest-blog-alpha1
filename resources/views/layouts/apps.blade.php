<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name', 'IHF')}}</title>
    {{-- bootstrap core --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
    {{-- this page style --}}
    <link rel="stylesheet" href="{{asset('css/golbal-styles.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/label/assets/vendors/iconfonts/mdi/css/materialdesignicons.css')}}">

    @stack('styles')
</head>

<body class="header-fixed">
    @include('partials.nav')
    <div class="page-body">
        @include('partials.sidebar')
        <div class="page-content-wrapper">
            <div class="page-content-wrapper-inner">
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
    {{-- bootstrap 5 core --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous">
    </script>
    {{-- this page script --}}
    <script src="{{asset('vendor/label/assets/vendors/js/core.js')}}"></script>
    <script src="{{asset('js/global-scripts.js')}}"></script>
    <script src="{{asset('vendor/label/assets/vendors/js/core.js')}}"></script>
    @stack('scripts')
</body>

</html>