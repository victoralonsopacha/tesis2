<nav class="navbar bg-white shadow-sm">

    <a class="navbar-brand" href="{{route('home')}}">
        {{config('app.name')}}
    </a>

    <ul class="nav nav-pills">
        <li class=" nav-item {{setActive('home')}}"><a href="{{ route('home') }}">Home</a></li>
        <li class="{{setActive('about')}}"><a class="nav-link" href="{{ route('about') }}">Justificiones</a></li>
        <li class="{{setActive('portfolio') }}"><a href="/portfolio">Vacaciones</a></li>
        <li class="{{setActive('permisos')}}"><a href="{{ route('permisos') }}">Permisos</a></li>  
        <li class="{{setActive('users.*')}}"><a href="{{ route('users.index') }}">Usuarios</a></li>
        
        @guest
            <li><a href="{{route('login')}}">Login</a></li>
            @else
            <li><a href="#"onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Cerrar Sesion</a></li>      
        @endguest   
        

    </ul>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>