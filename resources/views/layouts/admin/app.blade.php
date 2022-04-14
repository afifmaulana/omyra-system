<!DOCTYPE html>
<html lang="en">

@include('components.admin.head')

<body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">

        @include('components.admin.sidebar')

        @include('components.admin.navbar')
        
        @yield('content')

        @include('components.admin.footer')

      </div>
    </div>

    <script>
        const BASE_URL = "{{ url('') }}" + "/"
		const TOKEN = "{{ csrf_token() }}"
    </script>
    @include('components.admin.scripts')
    @stack('scripts')

  </body>

</html>
