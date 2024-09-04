{{-- <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>AdminLTE v4 | Dashboard</title><!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE v4 | Dashboard">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"><!--end::Primary Meta Tags--><!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous"><!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="../../dist/css/adminlte.css"><!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"><!-- jsvectormap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"><!-- jsvectormap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">
</head>

    <nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Start Navbar Links-->
            <ul class="navbar-nav">
                <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
                <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Home</a> </li>
                <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Contact</a> </li>
    <div class="container-fluid"> <!--begin::Start Navbar Links-->

        </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
        <div class="flex items-center">
            <img src="/images/logo.png" alt="" width="50" class="ms-3" >
        </div>

        <ul class="navbar-nav ms-auto pt-1"> <!--begin::Navbar Search-->

            <!--end::Notifications Dropdown Menu--> <!--begin::Fullscreen Toggle-->

                <p> @include('partials.langouge')</p>

            <li class="nav-item ms-4"> <a class="nav-link" href="#" data-lte-toggle="fullscreen"> <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i> <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i> </a> </li> <!--end::Fullscreen Toggle--> <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <img src="../../dist/assets/img/user2-160x160.jpg" class="user-image rounded-circle shadow" alt="User Image"> <span class="d-none d-md-inline">{{Auth::user()->name}}</span> </a>

                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <!--begin::User Image-->
                    <li class="user-header text-bg-primary"> <img src="../../dist/assets/img/user2-160x160.jpg" class="rounded-circle shadow" alt="User Image">
                        <p>
                              {{Auth::user()->name}}

                        </p>

                      </li>


                        <li class="user-footer" style="display: flex; align-items: center; justify-content: space-evenly; gap: 10px;">
                            <a href="{{route('profile.edit')}}" class="btn btn-default btn-flat ms-4 mr-1 ">Profile</a>

                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                @csrf

                                <x-dropdown-link class="btn btn-default btn-flat" :href="route('logout') "
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </li>
                </ul>
            </li> <!--end::User Menu Dropdown-->
        </ul> <!--end::End Navbar Links-->
    </div> <!--end::Container-->
</nav>

<script>
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
<script src="../../dist/js/adminlte.js"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
</script>




 --}}


 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>AdminLTE v4 | Dashboard</title>
     <!-- Include your stylesheets here -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="../../dist/css/adminlte.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">
     <style>
         body {
             padding: 0;
         }
         .app-header {
             position: absolute;
             top: 0;
             left: 0;
             width: 100%;

             background-color: white;
             color: black;
             box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
         }
         .app-header .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 10px;
            height: 40px;
        }
         .app-header .navbar-nav {
             display: flex;
             align-items: center;
         }
         .app-header .navbar-nav .nav-item {
             margin-right: 10px;
         }
         .app-header .navbar-nav .nav-link {
             padding: 8px;
             color: black;
             display: flex;
             align-items: center;
         }
         .app-header .navbar-nav .nav-link:hover {
             color: #adb5bd;
         }
         .app-header .navbar-nav .user-menu .dropdown-menu {
             min-width: 150px;
         }
         .navbar-brand img {
             width: 40px;
         }
         .navbar-toggler {
             border: none;
         }
         .translation-link {
             color: black;
         }
     </style>
 </head>
 <body>
     <nav class="app-header navbar navbar-expand navbar-light bg-white">
         <div class="container-fluid">
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <a class="navbar-brand ms-3">
                <img src="/images/logo.png" alt="Logo">
            </a>
             <div class="collapse navbar-collapse" id="navbarNav">
                 <ul class="navbar-nav">
                     <li class="nav-item ms-2">
                         <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                             <i class="bi bi-list"></i>
                         </a>
                     </li>
                     <li class="nav-item d-none d-md-block ms-2">
                        <a href="{{route('dashboard')}}" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item d-none d-md-block ms-3">
                        <a href="{{route('page_books')}}" class="nav-link">ALL Books</a>
                    </li>
                    <li class="nav-item d-none d-md-block  ms-3">
                        <a href="{{route('reserved_books')}}" class="nav-link"> Reserved Books</a>
                    </li>
                </ul>
                 <ul class="navbar-nav ms-auto">
                     <li class="nav-item">
                        {{-- <a class="nav-link translation-link d-flex align-items-center" href="#"> --}}
                             @include('partials.langouge')

                     </li>
                     <li class="nav-item ms-4">
                         <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                             <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                             <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i>
                         </a>
                     </li>
                     <li class="nav-item dropdown user-menu">
                         <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                             <img src="../../dist/assets/img/user2-160x160.jpg" class="user-image rounded-circle shadow" alt="User Image">
                             <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                         </a>
                         <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                             <li class="user-header text-bg-primary">
                                 <img src="../../dist/assets/img/user2-160x160.jpg" class="rounded-circle shadow" alt="User Image">
                                 <p>{{ Auth::user()->name }}</p>
                             </li>
                             <li class="user-footer d-flex justify-content-between align-items-center">
                                 <a href="{{ route('profile.edit') }}" class="btn btn-default btn-flat ms-4 mr-1">Profile</a>
                                 <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                     @csrf
                                     <x-dropdown-link class="btn btn-default btn-flat" :href="route('logout')"
                                         onclick="event.preventDefault();
                                         this.closest('form').submit();">
                                         {{ __('Log Out') }}
                                     </x-dropdown-link>
                                 </form>
                             </li>
                         </ul>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>

     <!-- Your content goes here -->

     <!-- Include your scripts here -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
     <script src="../../dist/js/adminlte.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"></script>
 </body>
 </html>
