<li><a href=" {{ route('login') }}" class="nav-link">{{ __("Administrar cursos") }}</a></li>
<li><a href=" {{ route('register') }}" class="nav-link"> {{ __("Administrar estudiantes") }}</a></li>
<li><a href=" {{ route('register') }}" class="nav-link"> {{ __("Administrar profesores") }}</a></li>
@include('partials.navigations.logged')