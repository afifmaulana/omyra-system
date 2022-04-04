<!doctype html>
<html lang="en">
  @include('components.head')
  @stack('styles')
  <body>
    @yield('content')
    @include('components.navbar-bottom')
    @include('components.scripts')
    @stack('scripts')
  </body>
</html>
