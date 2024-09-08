

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
    padding: 9px 55px;
    margin-top:5px;
    display: block;

 }

 .button .centered-link:hover {
     background-color: #184cd0;


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
                    <h2>Dash Board</h2>
                    <h5 style="margin-bottom:40px">Library Mangment System</h5>

                 <a href="{{ route('reservation') }}" class="animated-button">
                    Reserved Books
                </a>

                <a href="{{ route('return_book') }}" class="animated-button">
                    Returned Books
                </a>

                <div class="button mt-4">
                    <a href="{{ route('users.create') }}" class="centered-link"> <i class="bi bi-plus-circle-fill"></i> Create User</a>
                    <a href="{{ route('users.create') }}" class="centered-link"> <i class="bi bi-plus-circle-fill"></i> Create User</a>
                    <a href="{{ route('users.create') }}" class="centered-link"> <i class="bi bi-plus-circle-fill"></i> Create User</a>
                    <a href="{{ route('users.create') }}" class="centered-link"> <i class="bi bi-plus-circle-fill"></i> Create User</a>
                    <a href="{{ route('users.create') }}" class="centered-link"> <i class="bi bi-plus-circle-fill"></i> Create User</a>
                </div>



 </aside>




