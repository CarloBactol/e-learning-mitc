<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">

    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('admin.dashboard.index') }}">
            <img src="{{ asset('assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">E-Learning</span>
        </a>
    </div>


    <hr class="horizontal light mt-0 mb-2">

    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- Dashboard -->
            {{-- <li
                class="nav-item  text-white {{ request()->is('admin/dashboards') || request()->is('admin/dashboards') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboards.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li> --}}
            {{-- <li
                class="nav-item {{ request()->is('admin/dashboard') || request()->is('admin/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('Dashboard') }}</span></a>
            </li> --}}

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Dashboard</h6>
            </li>


            @if (Auth::user()->role_as == '1')
            <li class="nav-item ">

                <a class="nav-link text-white {{ Request()->is('admin/dashboard') ? 'active' : ''  }}"
                    href="{{ route('admin.dashboard.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            {{--
            <!-- Department -->
            {{-- <li class="nav-item ">
                <a class="nav-link text-white {{ Request::is('admin/departments') ? 'active' : ''  }} "
                    href="{{ route('admin.departments.index') }}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">apartment</i>
                    </div>

                    <span class="nav-link-text ms-1">Department</span>
                </a>
            </li> --}}

            <!-- Subject -->

            {{-- <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('admin/subjects') ? 'active' : ''  }}"
                    href="{{  route('admin.subjects.index') }}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">badge</i>
                    </div>

                    <span class="nav-link-text ms-1">Subject</span>
                </a>
            </li> --}}

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Department</h6>
            </li>

            <!-- Course -->
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('admin/courses') ? 'active' : ''  }}"
                    href="{{ route('admin.courses.index') }}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">school</i>
                    </div>

                    <span class="nav-link-text ms-1">Courses</span>
                </a>
            </li>

            <!-- Section -->
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('admin/sections') ? 'active' : ''  }}"
                    href="{{ route('admin.sections.index') }}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">school</i>
                    </div>

                    <span class="nav-link-text ms-1">Sections</span>
                </a>
            </li>

            <!-- Student -->
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('admin/students') ? 'active' : ''  }}"
                    href="{{   route('admin.students.index') }}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person_add</i>
                    </div>

                    <span class="nav-link-text ms-1">Students</span>
                </a>
            </li>


            <!-- Teacher -->
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('admin/teachers') ? 'active' : ''  }}"
                    href="{{  route('admin.teachers.index') }}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person_add</i>
                    </div>

                    <span class="nav-link-text ms-1">Teachers</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">School work</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('admin.categories.index') }}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">note_add</i>
                    </div>

                    <span class="nav-link-text ms-1">Categories</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('admin.questions.index') }}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">note_add</i>
                    </div>

                    <span class="nav-link-text ms-1">Questions</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('admin.options.index') }}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">note_add</i>
                    </div>

                    <span class="nav-link-text ms-1">Options</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('admin.results.index') }}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">note_add</i>
                    </div>

                    <span class="nav-link-text ms-1">Results</span>
                </a>
            </li>

            @endif


            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Profile</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('admin.profile') }}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>

                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>


            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Setting</h6>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white " href=" {{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>

                    <span class="nav-link-text ms-1">Sign Out</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

        </ul>
    </div>


</aside>