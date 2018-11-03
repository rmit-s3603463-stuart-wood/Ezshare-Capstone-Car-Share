<!DOCTYPE html>
<!--Displays base layout used in each pag of the websitee-->

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
