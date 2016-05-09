@section('content')
  <h1>Lecture! Delete</h1>
  @if(!empty($lecture))
    <div class="delete lecture">
      <p class="lead">Czy na pewno chcesz usunąć wykład? Nie będziesz miał możliwości przywrócenia go.</p>
      <a href="#" class="btn btn-back">Wróć</a>
      <form action="{{ URL::route('lecture.destroy', $lecture->id) }}" method="post">
        <input type="submit" class="btn btn-delete" value="Usuń">
      </form>
    </div>
  @else
    <p class="no-result">Dany wykład nie istnieje</p>
  @endif
@stop
