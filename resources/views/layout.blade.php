<!DOCTYPE html>
<html>

  <head>
    <head>
      @include('layouts.head')
      @yield('pageHead')
    </head>


    </head>

  <body>
    @include('layouts.navbar')

    <div class = "container">
      @yield('content')

    </div>
    @include('layouts.footer')

  </body>

</html>
