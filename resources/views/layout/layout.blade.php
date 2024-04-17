<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>THACH CLOUD | @yield('title')</title>
      <meta name="description" content="Thach Cloud cung cấp dịch vụ Hosting và VPS chất lượng cao.">
      <meta name="keywords" content="Thach Cloud, Hosting, VPS">
      <meta name="author" content="Thach Cloud">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
      <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-F1qfDMzWhaAOq92sXdF6Be8LwJwy3kGn9vEyIbEaL4lFX0e2xr0UIgnddveva6cF" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/material-design-iconic-font@latest/dist/css/material-design-iconic-font.min.css">
      <link rel="stylesheet" href="{{ asset('css/custominterface.css') }}">
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
   <body class="@yield('bodyclass')">
               <div class="loader_bg">
                  <div class="loader"><img src="{{ asset('images/loading.gif') }}" alt="Loading"/></div>
               </div>
      @include('layout/header')
            @yield('content')
        @include('layout/footer')

{{-- ====================== Side JAVASCRIPT ======================== --}}

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <script src="{{asset('js/jquery.min.js')}}"></script>
      <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('js/custom.js')}}"></script>
      <script src="{{asset('js/bonus.js')}}"></script>
      <script src="{{asset('js/jsform')}}"></script>
   </body>
</html>