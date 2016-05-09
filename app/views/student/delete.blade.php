@section('content')
  <h1>Student! Delete</h1>
  @if(!empty($student))
    <div class="delete">
      <p class="lead">Czy na pewno chcesz usunąć konto?</p>
      <a href="#" class="btn btn-back">Wróć</a>
      <form action="{{ URL::route('student.destroy', $student->id) }}" method="post">
        <input type="submit" class="btn btn-delete" value="Usuń">
      </form>
    </div>
  @else
    <p class="no-result">Dany student nie istnieje</p>
  @endif
@stop
