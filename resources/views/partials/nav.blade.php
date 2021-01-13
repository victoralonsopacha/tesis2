<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">
            {{config('app.name')}}
        </a>
        <span class="navbar-text">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


            <div class="collapse navbar-collapse" id="navbarText">

    <ul class="nav nav-pills">
        <li class=" nav-item {{setActive('home')}}"><a href="{{ route('home') }}">Home</a></li>
        <li class="{{setActive('about')}}"><a class="nav-link" href="{{ route('about') }}">Justificiones</a></li>
        <li class="{{setActive('portfolio') }}"><a href="/portfolio">Vacaciones</a></li>
        {{-- <li class="{{setActive('permisos.*')}}"><a href="{{ route('permisos.index') }}">Permisos</a></li>  --}}
        <li class="{{setActive('users.*')}}"><a href="{{ route('users.index') }}">Usuarios</a></li>
        <li class="{{setActive('permisos.*')}}"><a href="{{ route('permisos.index') }}">Permisos</a></li>

        @guest
            <li><a href="{{route('login')}}">Login</a></li>
            @else
            <li><a href="#"onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Cerrar Sesion</a></li>
        @endguest



                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class=" nav-item {{setActive('home')}}">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item {{setActive('about')}} ">
                        <a class="nav-link" href="{{ route('about') }}">Justificiones</a>
                    </li>
                    <li class="nav-item {{setActive('portfolio') }}">
                        <a class="nav-link" href="/portfolio">Vacaciones</a>
                    </li>
                    <li class="nav-item {{setActive('permisos')}}">
                        <a class="nav-link" href="{{ route('permisos') }}">Permisos</a>
                    </li>
                    <li class="nav-item{{setActive('users.*')}}">
                        <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
                    </li>

                    @guest
                        <li><a class="nav-link" href="{{route('login')}}">Login</a></li>
                    @else
                        <li><a class="nav-link" href="#"onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Cerrar Sesion</a></li>
                    @endguest
                </ul>

            </div>
        </span>
    </div>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
