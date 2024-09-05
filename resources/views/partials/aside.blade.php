

 <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
     <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="#" class="brand-link"> <!--begin::Brand Image--> <img src="../../dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">{{  __ ('messages.manegerbook') }}</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
     <div class="sidebar-wrapper">
         <nav class="mt-2"> <!--begin::Sidebar Menu-->
             <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                 <li class="nav-item"> <a href="#" class="nav-link active"> <i class="nav-icon bi bi-speedometer"></i>
                         <p>
                             {{  __ ('messages.view') }}
                             <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item"> <a href="{{route('return_book')}}" class="nav-link active"> <i class="nav-icon bi bi-circle"></i>
                                 <p>الكتب المسلمة</p>
                             </a> </li>
                         {{-- <li class="nav-item"> <a href="{{route('books')}}" class="nav-link"> <i class="nav-icon bi bi-circle"></i> --}}
                                 <p>{{  __ ('messages.All_Books') }}</p>
                             </a> </li>
                         {{-- <li class="nav-item"> <a href="{{route('categories')}}" class="nav-link"> <i class="nav-icon bi bi-circle"></i> --}}
                                 <p>{{  __ ('messages.All_Categories') }}</p>
                             </a> </li>
                             <hr>

                     </ul>
                  </li>
              <div class="sidebar">
                 {{-- <a href={{route("users.create")}}><i class="bi bi-plus-circle-fill"></i>{{  __ ('messages.Add_User') }}</a> --}}
                 {{-- <a href={{route("books.create")}}><i class="bi bi-plus-circle-fill"></i> {{  __ ('messages.Add_Book') }}</a> --}}
                 {{-- <a href={{route("categories.create")}}><i class="bi bi-plus-circle-fill"></i> {{  __ ('messages.Add_Category') }}</a> --}}
             </div>


 </aside>

