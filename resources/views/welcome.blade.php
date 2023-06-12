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
</head>

@if (session('message'))
<div class="row">
    <div class="col-lg-6">
        <div class=" alert alert-success">
            <span class="text-white"> {{ session('message') }}</span>
        </div>
    </div>
</div>
@endif

<body class="bg-gray-200">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav
                    class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid ps-2 pe-0">
                        @guest
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="">
                            E-Learning
                        </a>
                        @endguest
                        @auth
                        @if(Auth::user()->role_as == '1')
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 "
                            href="{{ route('admin.dashboard.index') }}">
                            E-Learning
                        </a>
                        @elseif (Auth::user()->role_as == '2')
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 "
                            href="{{ route('teacher.dashteachers.index') }}">
                            E-Learning
                        </a>
                        @elseif (Auth::user()->role_as == '0')
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 "
                            href="{{ route('dashstudents.index') }}">
                            E-Learning
                        </a>

                        @endif
                        @endauth


                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    @auth
                                    @if(Auth::user()->role_as == '1')
                                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                        href="{{ route('admin.dashboard.index') }}">
                                        <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                                        Dashboard
                                    </a>
                                    @elseif (Auth::user()->role_as == '2')
                                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                        href="{{ route('teacher.dashteachers.index') }}">
                                        <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                                        Dashboard
                                    </a>
                                    @elseif (Auth::user()->role_as == '0')
                                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                        href="{{ route('dashstudents.index') }}">
                                        <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                                        Dashboard
                                    </a>
                                    @endif
                                    @endauth

                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('{{ asset('assets/img/cover/cover.jpg') }}">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto ">
                @guest
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" action="{{ route('login') }}" class="text-start">
                                    @csrf
                                    <div class="input-group input-group-outline my-3">
                                        {{-- <label class="form-label">Email</label> --}}
                                        <input type="email" name="email" placeholder="Email"
                                            class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        {{-- <label class="form-label">Password</label> --}}
                                        <input type="password" name="password" placeholder="Password"
                                            class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-check form-switch d-flex align-items-center mb-3">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                                        <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                                    </div> --}}
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign
                                            in</button>
                                    </div>
                                    {{-- <p class="mt-4 text-sm text-center">
                                        Don't have an account?
                                        <a href="../pages/sign-up.html"
                                            class="text-primary text-gradient font-weight-bold">Sign up</a>
                                    </p> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @auth

                @endauth
                @endguest

            </div>

        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js')}} "></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js')}} "></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js')}} "></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js')}} "></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js')}} "></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.4') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.4.min.js') }}"></script>
</body>

</html>