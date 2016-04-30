@section('content')
  <h1>Tag! Index</h1>
  <a href="{{ URL::route('tag.new') }}">Nowy</a>
  <div class="tags">
    @foreach( $tags as $tag)
      <div class="tag">
        <h2><a href="{{ URL::route('tag.view', $tag->id) }}">{{ $tag->name }}</a></h2>
        <!--<a class="btn btn-more" href=""></a>-->
      </div>
    @endforeach
  </div>
@stop
