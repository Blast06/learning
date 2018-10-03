<div class="col-2">
    @auth
        {{--se pasa la instancia del curso despues de escribir la policy--}}
        @can('opt_for_course', $course)
            {{--el usuario se puede suscribir a la plataforma porque no tiene ningun plan contratado--}}
            @can('subscribe', \App\Course::class)
                <a href="{{ route('subscriptions.plans') }}" class="btn btn-subscribe btn-bottom btn-block">
                    <i class="fa fa-bolt"></i> {{ __("Suscribirme") }}
                </a>
            @else
                {{--el usuario esta suscrito a un plan, pero ahora hay que ver si se puede suscribir a un curso--}}
                @can('inscribe', $course)
                    <a href="" class="btn btn-subscribe btn-bottom btn-block">
                        <i class="fa fa-bolt"></i> {{ __("Inscribirme") }}
                    </a>
                @else
                    <a href="" class="btn btn-subscribe btn-bottom btn-block">
                        <i class="fa fa-bell"></i> {{ __("Inscrito") }}
                    </a>
                @endcan
            @endcan
        @else
            <a href="" class="btn btn-subscribe btn-bottom btn-block">
                <i class="fa fa-user"></i> {{ __("Soy autor") }}
            </a>
        @endcan

    @else
        <a href="{{ route('login') }}" class="btn btn-subscribe btn-bottom btn-block">
            <i class="fa fa-user"></i> {{ __("Acceder") }}
        </a>
    @endauth
</div>