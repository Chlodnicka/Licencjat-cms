@section('content')
  <h1>Exercise! Delete</h1>
  @if(!empty($exercise))
  <div class="delete">
    <p class="lead">Czy na pewno chcesz usunąć ćwiczenie? Nie będziesz miał możliwości przywrócenia go.</p>
    <a href="#" class="btn btn-back">Wróć</a>
    <form action="{{ URL::route('exercise.destroy', $exercise->id) }}" method="post">
      <input type="submit" class="btn btn-delete" value="Usuń">
    </form>
  </div>
  @else
    <p class="no-result">Dane ćwiczenie nie istnieje</p>
  @endif
@stop
