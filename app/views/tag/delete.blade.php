@section('content')
  <h1>Tag! Delete</h1>
  <div class="delete">
    <p class="lead">Czy na pewno chcesz usunąć tag?</p>
    <a href="#" class="btn btn-back">Wróć</a>
    <form action="{{ URL::route('tag.destroy', $tag->id) }}" method="post">
      <input type="submit" class="btn btn-delete" value="Usuń">
    </form>
  </div>
@stop
