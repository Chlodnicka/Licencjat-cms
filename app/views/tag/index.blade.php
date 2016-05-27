@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.tags-list') }}</h1>
    </div>
  </div>
  @if($actions == 1)
    <div class="action-buttons">
      <a href="{{ URL::route('tag.new') }}">{{ trans('common.new') }}</a>
    </div>
  @endif
  @if(!empty($tags))
    <div class="tags">
      @foreach( $tags as $tag)
        <div class="tag">
          <h2><a href="{{ URL::route('tag.view', $tag->id) }}">{{ $tag->name }}</a></h2>
        </div>
      @endforeach
        <?php echo $tags->links(); ?>
    </div>
  @endif
@stop
