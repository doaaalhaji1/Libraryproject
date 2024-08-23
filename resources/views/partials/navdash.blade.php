
<style>
    /* تطبيق ستايل على الروابط */
ul li a {
    text-decoration: none;
    color: #333;
    padding: 1px;
    display: flex;
    border-radius: 5px;
    transition: background-color 0.3s ease, color 0.3s ease;
    margin-left:5px;

}



</style>
<div class="app-wrapper"> <!--begin::Header-->
    <nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Start Navbar Links-->
            <ul class="navbar-nav">
                <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
                <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Home</a> </li>
                <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Contact</a> </li>
    <div class="container-fluid"> <!--begin::Start Navbar Links-->

        </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
        <div class="flex items-center">
            <img src="./images/logo.png" alt="" width="50" class="ms-3" >
        </div>

        <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->

            </li> <!--end::Notifications Dropdown Menu--> <!--begin::Fullscreen Toggle-->

                <p> @include('partials.langouge')</p>

            <li class="nav-item"> <a class="nav-link" href="#" data-lte-toggle="fullscreen"> <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i> <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i> </a> </li> <!--end::Fullscreen Toggle--> <!--begin::User Menu Dropdown-->
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
<!--end::Header--> <!--begin::Sidebar-->






