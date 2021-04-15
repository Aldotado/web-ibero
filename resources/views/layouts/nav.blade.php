<header class="px-3 py-2 text-white personal-header">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none text-app">
        App Tareas
      </a>

      <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
      	@guest

      	@else
        <li>
          <a href="{{ route('home') }}" class="loggedin-options nav-link text-white mx-5">
            <ion-icon name="home-outline"></ion-icon>
            Vista General
          </a>
        </li>
        <li>
          <a href="{{ route('proyectos.index') }}" class="loggedin-options nav-link text-white mx-5">
            <ion-icon name="folder-open-outline"></ion-icon>
            Proyectos
          </a>
        </li>
        <li>
          <a href="{{ route('tareas.index') }}" class="loggedin-options nav-link text-white mx-5">
            <ion-icon name="list-outline"></ion-icon>
            Tareas
          </a>
        </li>
        @endguest
        @guest
        <li>
        	<a href="{{ route('login') }}" class="me-3 nav-link btn btn-dark text-light me-2 loggin-btn"><ion-icon name="log-in-outline"></ion-icon>Iniciar Sesión</a>
        </li>
        <li>
        	<a href="{{ route('register') }}" class="nav-link btn btn-light text-dark"><ion-icon name="add-circle-outline"></ion-icon>Registrarse</a>
        </li>
        @else
        <div class="dropdown">
			  <button class="btn btn-light btn-user-txt" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><ion-icon name="person-circle-outline"></ion-icon>
			    {{ Auth::user()->name }}
			  </button>
			  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
			          <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Cerrar Sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
			  </ul>
			 </div>
        @endguest
      </ul>
    </div>
  </div>
</header>