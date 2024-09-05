

 <style>
    .sidebar {
     /* background-color: #343a40; */
     display: flex;
     flex-direction: column;
     text-align: center;
     justify-content: center;
 }

 .button a {
     color: white;
     display: block;
     padding: 10px 20px;
     margin: 5px 0;
     font-size: 18px;
     text-decoration: none;
     border-radius: 10px;
     text-align: left;
 }
 .sidebar a:hover {
     background-color: #184cd0;
     text-decoration: none;
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
    border-radius: 5px;
    text-decoration: none;
    transition: transform 0.2s, background-color 0.3s;
    animation: pulse 2s infinite;
}

.animated-button:hover {
    background-color: #0056b3;
    transform: scale(1.1);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.animated-button:active {
    transform: scale(0.95); /* تقليل الحجم عند الضغط */
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
                    <h2>Dash Board</h2>
                    <h5 style="margin-bottom:40px">Library Mangment System</h5>

                 <a href="{{ route('reservation') }}" class="animated-button">
                    Reserved Books
                </a>

                <a href="{{ route('return_book') }}" class="animated-button">
                    Returned Books
                </a>

                <div class="button">

                </div>
                 {{-- <a href={{route("users.create")}}><i class="bi bi-plus-circle-fill"></i>{{  __ ('messages.Add_User') }}</a> --}}
                 {{-- <a href={{route("categories.create")}}><i class="bi bi-plus-circle-fill"></i> {{  __ ('messages.Add_Category') }}</a> --}}
                </div>



 </aside>




