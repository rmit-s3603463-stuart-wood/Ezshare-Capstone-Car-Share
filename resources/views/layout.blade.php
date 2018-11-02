<!DOCTYPE html>
<html>

  <head>

      @include('layouts.head')
      @yield('pageHead')

    </head>

  <body>
    @include('layouts.navbar')

      @yield('content')

    @include('layouts.footer')

  </body>

</html>
