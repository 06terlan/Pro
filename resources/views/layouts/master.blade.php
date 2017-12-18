<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts.head')
  </head>

  <body>
    @include('layouts.menu')

    @yield('content')
    <hr>

    
    @include('layouts.footer')
  </body>

</html>
