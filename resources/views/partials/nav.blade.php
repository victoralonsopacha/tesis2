<nav>
    <ul>
        <li class="{{setActive('home')}}"><a href="{{ route('home') }}">Home</a></li>
        <li class="{{setActive('about')}}"><a href="{{ route('about') }}">Justificiones</a></li>
        <li class="{{setActive('portfolio') }}"><a href="/portfolio">Vacaciones</a></li>
        <li class="{{setActive('permisos')}}"><a href="{{ route('permisos') }}">Permisos</a></li>  
        <li class="{{setActive('users.*')}}"><a href="{{ route('users.index') }}">Usuarios</a></li>         
    </ul>
</nav>