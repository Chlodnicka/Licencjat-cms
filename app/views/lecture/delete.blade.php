@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.lecture-delete') }} {{ $lecture->title }}</h1>
    </div>
  </div>
  @if(!empty($lecture))
    <div class="delete lecture">
      <p class="lead">{{ trans('app.lecture-delete-message') }}</p>
      <div class="action-buttons">
        <a href="{{ URL::route('lecture.view', $lecture->id) }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
      </div>
      <form action="{{ URL::route('lecture.destroy', $lecture->id) }}" method="post">
        <input type="submit" class="btn btn-danger" value="{{ trans('common.delete') }}">
      </form>
    </div>
  @else
    <p class="no-result">{{ trans('app.no-such-lecture') }}</p>
  @endif
@stop
