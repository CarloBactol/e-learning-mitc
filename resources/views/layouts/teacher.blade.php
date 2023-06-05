<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'E-Learning') }}</title>
  <!-- CSS -->
  <link href="{{ asset('./assets/css/bootstrap-5.css') }}" rel="stylesheet">

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.0.4') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

  @yield('css')
</head>


<body class="g-sidenav-show  bg-gray-200">

  {{-- Aside --}}
  @include('layouts.include.teacher_aside')

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('layouts.include.teacher_nav')

    @yield('content')

  </main>
  <!-- PlugIN -->
  {{-- @include('layouts.include.plugin') --}}

  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/popper.min.js')}} "></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js')}} "></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js')}} "></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js')}} "></script>
  <script src="{{ asset('assets/js/plugins/chartjs.min.js')}} "></script>



  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.4') }}"></script>
  <script src="{{ asset('assets/js/jquery-3.6.4.min.js') }}"></script>
  @yield('script')

</body>

</html>