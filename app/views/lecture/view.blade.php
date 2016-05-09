@section('content')
  @if(!empty($lecture))
    <div class="lecture single-page">
      @if(!empty($lecture->title))
        <h1>{{ $lecture->title }}</h1>
      @endif
      @if(!empty($lecture->lead))
        <p class="lead">{{ $lecture->lead }}</p>
      @endif
      <div class="action-buttons">
        <a href="{{ URL::route('lecture.new') }}">Nowy</a>
        <a href="{{ URL::route('lecture.edit', $lecture->id) }}">Edytuj</a>
        <a href="{{ URL::route('lecture.delete', $lecture->id) }}">Usuń</a>
      </div>
      @if(!empty($lecture->content))
        <div class="richtext">
          {{ $lecture->content }}
        </div>
      @endif
        <a href="{{ URL::route('lecture.indexCourse', $lecture->course->id) }}" class="btn btn-back"><i class="fa fa-long-arrow-left"></i>Wróć</a>
        <a href="{{URL::route('exercise.index')}}" class="btn btn-more">Idź do zadań<i class="fa fa-long-arrow-right"></i></a>
    </div>
  @else
    <p class="no-result">Dany wykład nie istnieje</p>
  @endif
@stop
