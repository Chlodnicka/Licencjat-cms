@section('content')
  <div class="content course">
    <h1 class="title">{{ $course->name }}</h1>
    <p class="lead">{{$course->lead}}</p>
    <a href="{{ URL::route('course.edit', $course->id) }}">Edytuj</a>
    <a href="{{ URL::route('course.delete', $course->id) }}">Usuń</a>
    <a href="{{ URL::route('course.new') }}">Nowy</a>
    <div class="richtext">
      <div>{{ $course->description }}</div>
    </div>
    <div class="lectures">
      <h2>Wykłady</h2>
      <ul>
        @foreach($lectures as $lecture)
          <a href="{{ URL::route('lecture.view', $lecture->id) }}"><li>{{ $lecture->title }}</li></a>
        @endforeach
      </ul>
      <a href="{{ URL::route('lecture.indexCourse', $course->id) }}" class="btn btn-more">Więcej <i class="fa fa-long-arrow-right"></i></a><!--dopisać index do lectures dla różnych kursów-->

    </div>
    <div class="exercises">
      <h2>Zadania</h2><!--dopisać index w zaleźności od wykładu, przypiwania itd!-- BW!-->
      <ul>
        <a href="{{ URL::route('exercise.view') }}"><li>Zadania do wykładu 1</li></a>
        <a href="{{ URL::route('exercise.view') }}"><li>Zadania do wykładu 2</li></a>
        <a href="{{ URL::route('exercise.view') }}"><li>Zadania do wykładu 3</li></a>
        <a href="{{ URL::route('exercise.view') }}"><li>Przykładowe zadania egzaminacyjne</li></a>
        <a href="{{ URL::route('exercise.view') }}"><li>Trudne</li></a>
        <a href="{{ URL::route('exercise.view') }}"><li>Łatwe</li></a>
      </ul>
      <a href="{{ URL::route('exercise.indexCourse', $course->id) }}" class="btn btn-more">Więcej <i class="fa fa-long-arrow-right"></i></a>
    </div>
    <a href="{{ URL::route('course.index') }}" class="btn btn-back"><i class="fa fa-long-arrow-left"></i>Wroć</a>
  </div>
@stop
