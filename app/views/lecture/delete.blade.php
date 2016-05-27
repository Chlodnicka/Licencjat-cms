@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.lecture-delete') }} {{ $lecture->title }}</h1>
    </div>
  </div>
  @if(!empty($lecture))
    <div class="delete lecture">
      <p class="lead">{{ trans('app.lecture-delete-message') }}</p>
      <a href="#" class="btn btn-back">{{ trans('common.back') }}</a>
      <form action="{{ URL::route('lecture.destroy', $lecture->id) }}" method="post">
        <input type="submit" class="btn btn-delete" value="{{ trans('app.delete') }}">
      </form>
    </div>
  @else
    <p class="no-result">{{ trans('app.no-such-lecture') }}</p>
  @endif
@stop
