@section('content')
  <h1>{{ $exercise->title }}</h1>
  <h2>{{ $exercise->course->name }}</h2>
  <div class="content exercise">
    <div class="properties">
      <p>{{ $exercise->difficulty }} | {{ $exercise->lecture->title }}</p>
      <div class="tags"><!--ogarnąć tagi!-->
        <p><a href="#">tag 1</a></p>
        <p><a href="#">tag 2</a></p>
        <p><a href="#">tag 3</a></p>
      </div>
    </div>
    <div class="exercise-content">
      <h3>Treść zadania</h3>
      <p>{{ $exercise->content }}</p>
    </div>
    <div class="exercise-solution dropdown">
      <h3>Rozwiązanie zadania <i class="fa fa-chevron-down"></i></h3>
      <p>{{ $exercise->solution }}</p>
    </div>
    <p class="no-solution">Brak rozwiązania</p>
    <a href="{{ URL::route('exercise.indexCourse', $exercise->course->id) }}" class="btn btn-back"><i class="fa fa-long-arrow-left"></i>Wróć</a>
  </div>
@stop
