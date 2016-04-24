@section('content')
  <h1>Tag! Edit</h1>
  <form action="{{ URL::route('tag.update', $tag->id) }}" method="post">
    <label for="name">Tag</label>
    <input type="text" id="name" name="name" value="{{ $tag->name }}">
    <input type="submit" class="btn btn-submit">
  </form>
@stop
