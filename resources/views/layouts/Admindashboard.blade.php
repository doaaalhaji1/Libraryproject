<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Dashboard | Library Mangment</title><!--begin::Primary Meta Tags-->
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
    @if (app()->getLocale() == 'ar')
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-rtl/dist/css/bootstrap.rtl.min.css">
   @endif
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"><!-- jsvectormap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .app-main
        {
            margin-top:70px;
           }
    </style>
</head> <!--end::Head--> <!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
<div class="app-wrapper">
    @include('partials.navdash')
      @include('partials.aside')

        <main class="app-main"> <!--begin::App Content Header-->

            <div class="app-content mt-3"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row"> <!--begin::Col-->
                    @if(auth()->check() && auth()->user()->role != 'employee')
                    <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 4-->
                            <a href="{{ route('users') }}" class="text-decoration-none"> <!-- Add link here -->
                                <div class="small-box text-bg-primary">
                                    <div class="inner">
                                        <h3>{{__('dash.ALL_Users')}}</h3>
                                        <p><i class="fas fa-users" style="font-size: 30px;"></i></p>
                                    </div>
                                </div> <!--end::Small Box Widget 4-->
                            </a>
                        </div>
                   @endif

                        <div class="col-lg-3 col-6">
                            <a href="{{ route('books') }}" class="text-decoration-none"> <!-- Add link here -->
                                <div class="small-box text-bg-success">
                                    <div class="inner">
                                        <h3>{{__('dash.ALL_Books')}}</h3>
                                        <p>
                                            <i class="fas fa-book" style="font-size: 30px;"></i>

                                            <i class="fas fa-book" style="font-size: 30px;"></i>
                                        </p>
                                    </div>
                                </div> <!--end::Small Box Widget 1-->
                            </a>
                        </div>
                        <div class="col-lg-3 col-6">
                            <a href="{{ route('categories') }}" class="text-decoration-none"> <!-- Add link here -->
                                <div class="small-box text-bg-danger">
                                    <div class="inner">
                                        <h3>{{__('dash.ALL_categories')}}</h3>
                                        <p><i class="fas fa-grip-vertical" style="font-size: 30px;"></i></p>
                                    </div>
                                </div> <!--end::Small Box Widget 2-->
                            </a>
                        </div>
                        <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 3-->
                            <a href="{{ route('authors') }}" class="text-decoration-none"> <!-- Add link here -->
                                <div class="small-box text-bg-info">
                                    <div class="inner">
                                        <h3>{{__('dash.ALL_Authors')}}</h3>
                                        <p><i class="fas fa-users" style="font-size: 30px;"></i></p>
                                    </div>
                                </div> <!--end::Small Box Widget 3-->
                            </a>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div><!--end::Col-->
            <div class="ms-3 me-3">
                @yield("content")
            </div>
                     </main>

                    </body>

                    <footer class="app-footer"> <!--begin::To the end-->
                        <div class="float-end d-none d-sm-inline">{{__('dash.text_footer1')}}</div> <!--end::To the end-->

                        <strong>
                         {{__('dash.text_footer2')}}
                        </strong>
                        {{__('dash.text_footer3')}}

                    </footer> <!--end::Footer-->
    </div>

