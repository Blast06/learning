<li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle"
       data-toggle="dropdown"
       role="button"
       aria-haspopup="true"
       aria-expanded="false"
       id="navbarDropdown"
    >{{ auth()->user()->name }} <span class="caret"></span> </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a href="{{route('logout')}}" class="dropdown-item"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            {{ __("Cerrar sesion") }}
        </a>

        <form id="logout-form" action=" {{route('logout')}}" method="post" style="display: none;">
            @csrf
        </form>
    </div>
</li>

