@section('content')
  <h1>Tag! Index</h1>
  <div class="action-buttons">
    <a href="{{ URL::route('tag.new') }}">Nowy</a>
  </div>
  @if(!empty($tags))
    <div class="tags">
      @foreach( $tags as $tag)
        <div class="tag">
          <h2><a href="{{ URL::route('tag.view', $tag->id) }}">{{ $tag->name }}</a></h2>
        </div>
      @endforeach
    </div>
  @endif
@stop
