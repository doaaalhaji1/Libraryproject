
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminLTE v4 | Dashboard</title>
    <!-- Include your stylesheets here -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    @endif
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
         /* RTL adjustments */
         [dir="rtl"] .app-header .navbar {
            flex-direction: row-reverse;
        }
        [dir="rtl"] .app-header .navbar-nav .nav-item {
            margin-left: 10px;
            margin-right: 0;
        }
        [dir="rtl"] .app-header .navbar-nav .nav-link {
            padding-left: 8px;
            padding-right: 0;
        }


    </style>
</head>
<body>
    <nav class="app-header navbar navbar-expand navbar-light bg-white ">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand ms-3">
                <img src="/images/logo.png" alt="Logo">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item d-none d-md-block ms-5">
                        <a href="{{route('page_books')}}" class="nav-link">{{__('user.ALL_Books')}}</a>
                    </li>
                    <li class="nav-item d-none d-md-block  ms-4">
                        <a href="{{route('mybook_user')}}" class="nav-link">{{__('user.My_Books')}}</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto me-0">
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
                            @if(Auth::check() && Auth::user()->image && file_exists(public_path('storage/' . Auth::user()->image)))
                                <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="User Image" width="35px" height="35px" class="rounded-circle shadow" loading="lazy">
                            @else
                                <img src="{{ asset('images/userdetails.jpg') }}" alt="Default User Image" width="35px" height="35px" class="rounded-circle shadow" loading="lazy">
                            @endif
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <li class="user-header text-bg-primary">
                                @if(Auth::check() && Auth::user()->image && file_exists(public_path('storage/' . Auth::user()->image)))
                                    <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="User Image" width="35px" height="35px" class="rounded-circle shadow" loading="lazy">
                                @else
                                    <img src="{{ asset('images/userdetails.jpg') }}" alt="Default User Image" width="35px" height="35px" class="rounded-circle shadow" loading="lazy">
                                @endif
                                <p>{{ Auth::user()->name }}</p>
                            </li>
                            <li class="user-footer d-flex justify-content-between align-items-center">
                                <a href="{{ route('profile.edit') }}" class="btn btn-default btn-flat ms-4 mr-1">{{__('public.Profile')}}</a>
                                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                    @csrf
                                    <x-dropdown-link class="btn btn-default btn-flat" :href="route('logout')"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('public.Log_Out') }}
                                    </x-dropdown-link>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="../../dist/js/adminlte.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"></script>
</body>
</html>




