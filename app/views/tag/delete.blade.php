@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.tag-delete') }}</h1>
    </div>
  </div>
  @if(!empty($tag))
    <div class="delete">
      <p class="lead">{{ trans('app.tag-delete-message') }}</p>
      <a href="#" class="btn btn-back">{{ trans('common.back') }}</a>
      <form action="{{ URL::route('tag.destroy', $tag->id) }}" method="post">
        <input type="submit" class="btn btn-delete" value="{{ trans('common.delete') }}">
      </form>
    </div>
  @else
    <p class="no-result">{{ trans('app.no-such-tag') }}</p>
  @endif
@stop
