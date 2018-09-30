<div class="row mb-4">
    <div class="col-md-12">
        <div class="card" style="background-image: url('{{ url('/images/jumbotron.png') }}');">
            <div class="text-white text-center d-flex align-items-center py-5 px-4 my-5">
                <div class="col-5">
                    <img class="img-fluid" src="{{ $course->pathAttachment() }}"/>
                </div>
                <div class="col-5 text-left">
                    <h1> {{ __("Curso") }}: {{ $course->name }}</h1>
                    {{--se llama al teacher, luego al user y un user tiene nombre(el teacher no, porque extiende de user)--}}
                    <h4> {{ __("Profesor") }}: {{ $course->teacher->user->name }}</h4>
                    <h5> {{ __("Categoria") }}: {{ $course->category->name }}</h5>
                    <h5> {{ __("Fecha publicacion") }}: {{ $course->created_at->format('d/m/Y') }}</h5>
                    <h6> {{ __("Fecha publicacion") }}: {{ $course->updated_at->format('d/m/Y') }}</h6>
                    <h6> {{ __("Estudiantes inscritos") }}: {{ $course->students_count }}</h6>
                    <h6> {{ __("Reviews") }}: {{ $course->reviews_count }}</h6>
                    @include('partials.courses.rating')
                </div>
                @include('partials.courses.action_button')
            </div>
        </div>
    </div>
</div>
