@section('content')
  <h1>News! Delete</h1>
  <div class="delete">
    <p class="lead">Czy na pewno chcesz usunąć wiadomość?</p>
    <a href="#" class="btn btn-back">Wróć</a>
    <form action="{{ URL::route('news.destroy', $news->id) }}" method="post">
      <input type="submit" class="btn btn-delete" value="Usuń">
    </form>
  </div>
@stop
