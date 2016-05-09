@section('content')
  <h1>Tag! Delete</h1>
  @if(!empty($tag))
    <div class="delete">
      <p class="lead">Czy na pewno chcesz usunąć tag?</p>
      <a href="#" class="btn btn-back">Wróć</a>
      <form action="{{ URL::route('tag.destroy', $tag->id) }}" method="post">
        <input type="submit" class="btn btn-delete" value="Usuń">
      </form>
    </div>
  @else
    <p class="no-result">Dany tag nie istnieje</p>
  @endif
@stop
