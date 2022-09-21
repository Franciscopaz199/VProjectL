<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }} " />
    @yield('links')
    
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <link href="{{asset('bot/bootstrap-5.2.1-dist/css/bootstrap.min.css')}}" rel="stylesheet" >
    <script src="{{asset('bot/bootstrap-5.2.1-dist/js/bootstrap.bundle.js')}}"></script>
</head>
<body>   
  @if (request()->routeIs('sesionStar','index','registershow')  )
    @include('layouts.nav')
  @else
    @include('layouts.navegacion2')
  @endif

    <section class="bodyPage">
      @yield('body')
    </section>
    @yield('inter')

    @include('layouts.footer')

</body>
<script  src="{{ asset('js/index.js') }}"></script>
  @yield('scripts')
</html>