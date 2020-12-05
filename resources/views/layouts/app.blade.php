<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{config('app.name')}}</title>
  <link rel="stylesheet" href="{{asset('css/golbal-styles.css')}}">
  <link rel="stylesheet" href="{{asset('css/login-styles.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/label/assets/vendors/iconfonts/mdi/css/materialdesignicons.css')}}">
</head>

<body>

  <div class="authentication-theme auth-style_1">
    <div class="row">
      <div class="col-12 logo-section">
        <a href="../../index.html" class="logo">
          <img src="{{asset('vendor/label/assets/images/logo.svg')}}" alt="logo" />
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-7 col-sm-9 col-11 mx-auto">
        <div class="grid">
          <div class="grid-body">
            <div class="row">
              <div class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper">
                @yield('content')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="auth_footer">
      <p class="text-muted text-center">© Label Inc 2019</p>
    </div>
  </div>

  <script src="{{asset('vendor/label/assets/vendors/js/core.js')}}"></script>
  <script src="{{asset('vendor/label/assets/vendors/js/vendor.addons.js')}}"></script>
  <script src="{{asset('js/global-scripts.js')}}"></script>
</body>

</html>