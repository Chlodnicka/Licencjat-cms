@section('content')
  <h1>{{ trans('app.tags-list') }}</h1>
  <div class="action-buttons">
    <a href="{{ URL::route('tag.new') }}">{{ trans('common.new') }}</a>
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
