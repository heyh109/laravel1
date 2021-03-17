<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <title>@yield('title', '弱覆盖商铺可视化系统')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="cgw.png">
    
    @yield('type')
  </head>
  <body>
    @include('layouts._header')

		@yield('content')
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{ URL::asset('js/jquery.slim.min.js') }}"></script>
  <script src="{{ URL::asset('js/popper.min.js') }}"></script>
  <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

  @yield('script')
  </body>
</html>

@yield('scripts')