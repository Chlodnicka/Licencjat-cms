@section('content')
<div class="lecture single-page">
  <h1>{{ $lecture->title }}</h1>
  <p class="lead">{{ $lecture->lead }}</p>
  <a href="{{ URL::route('lecture.new') }}">Nowy</a>
  <a href="{{ URL::route('lecture.edit', $lecture->id) }}">Edytuj</a>
  <a href="{{ URL::route('lecture.delete', $lecture->id) }}">Usuń</a>
  <div class="richtext">
    {{ $lecture->content }}
  </div>
  <a href="{{ URL::route('lecture.indexCourse', $lecture->course->id) }}" class="btn btn-back"><i class="fa fa-long-arrow-left"></i>Wróć</a>
  <a href="{{URL::route('exercise.index')}}" class="btn btn-more">Idź do zadań<i class="fa fa-long-arrow-right"></i></a>
</div>
@stop
