

 <style>
    .sidebar {
     display: flex;
     flex-direction: column;
     text-align: center;
     justify-content: center;
 }

 .button .centered-link {
     color: white;
     font-size: 18px;
     border-radius: 25px;
    text-decoration: none;
    padding: 9px  50px  9px 50px;

    margin-top:40px;

    display: inline-block;

 }

 .button .centered-link:hover {
     background-color: #007bff;


 }

 .sidebar a i {
     margin-right: 15px;


 }


/* ---------------------------------------- */

.animated-button {
    display: inline-block;
    padding: 10px 20px;
    margin: 10px;
    background-color: #007bff;
    color: white;
    border-radius: 25px;
    text-decoration: none;
    transition: transform 0.2s, background-color 0.3s;
    animation: pulse 2s infinite;
}

.animated-button:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}


@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

 </style>

 <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->

      <div class="sidebar mt-4" style="color:white;">
                    <h2>{{__('dash.Dashboard')}}</h2>
                    <h5 style="margin-bottom:40px">{{__('dash.Library_Mangment_System')}}</h5>

                 <a href="{{ route('reservation') }}" class="animated-button">
                 {{__('dash.Reserved_Books')}}
                </a>

                <a href="{{ route('return_book') }}" class="animated-button">
                    {{__('dash.Returned_Books')}}
                </a>

                <div class="button">
                @if(auth()->check() && auth()->user()->role != 'employee')
                   <a href="{{ route('users.create') }}" class="centered-link">
                  <i class="bi bi-plus-circle-fill"></i> {{__('dash.Add_User')}}
                 </a>
                   @endif
                    <a href="{{ route('books.create') }}" class="centered-link"> <i class="bi bi-plus-circle-fill"></i> {{__('dash.Add_Book')}}</a>
                    <a href="{{ route('categories.create')}}" class="centered-link"> <i class="bi bi-plus-circle-fill"></i> {{__('dash.Add_Categ')}}</a>
                    <a href="{{ route('authors.create') }}" class="centered-link"> <i class="bi bi-plus-circle-fill"></i> {{__('dash.Add_Authr')}}</a>

                </div>



 </aside>




