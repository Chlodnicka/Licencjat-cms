@section('content')
  <h1>Tag! New</h1>
  <form action="{{ URL::route('tag.create') }}" method="post">
    <label for="name">Tag</label>
    <input type="text" id="name" name="name">
    <input type="submit" class="btn btn-submit">
  </form>
@stop
