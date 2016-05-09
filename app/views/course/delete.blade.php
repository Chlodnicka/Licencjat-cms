@section('content')
  <h1>Course! Delete</h1>
  @if (!empty($course))
    <div class="delete course">
      <p class="lead">Czy na pewno chcesz usunąć kurs? Wraz z nim zostaną usunięte wszystkie materiały z nim powiązane: wyklady i zadania.</p>
      <a href="#" class="btn btn-back">Wróć</a>
      <form action="{{ URL::route('course.destroy', $course->id) }}" method="post">
        <input type="submit" class="btn btn-delete" value="Usuń">
      </form>
    </div>
  @else
    <p>Dany kurs nie istnieje</p>
  @endif
@stop
