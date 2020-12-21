<nav>
    <ul>
        <li class="{{setActive('home')}}"><a href="{{ route('home') }}">Home</a></li>
        <li class="{{setActive('about')}}"><a href="{{ route('about') }}">About</a></li>
        <li class="{{setActive('portfolio') }}"><a href="/portfolio">Portfolio</a></li>
        <li class="{{setActive('contact')}}"><a href="{{ route('contact') }}">Contact</a></li>  
        <li class="{{setActive('users.*')}}"><a href="{{ route('users.index') }}">Usuarios</a></li>         
    </ul>
</nav>