<div class="col-12 pt-0 mt-4">
    <h2 class="text-muted">
        {{ __("Cursos similares") }}
    </h2>
    <hr/>
</div>
<div class="container-fuild">
    <div class="row">
        @forelse($related as $relatedCourse)
            <div class="col-md-6 listing-block">
                <div class="media">
                    <div class="fa-box">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('courses.detail', $relatedCourse->id) }}">
                        <img src="/images/courses/{{ $relatedCourse->picture }}" alt="{{ $relatedCourse->name }}" class="d-flex align-self-lg-start">
                    </a>
                    <div class="media-body pl-3">
                        <div class="price">
                            <small>{{ $relatedCourse->name }}</small>
                        </div>
                        <div class="stats">
                            @include('partials.courses.rating', ['course' => $relatedCourse])
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-dark">
                {{ __("No existe ningun curso relacionado") }}
            </div>
        @endforelse
    </div>
</div>