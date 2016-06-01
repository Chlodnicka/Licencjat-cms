@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.news-delete') }} {{ $news->title }}</h1>
    </div>
  </div>

  @if(!empty($news))
    <div class="delete news">
      <p class="lead">{{ trans('app.news-delete-message') }}</p>
      <div class="action-buttons">
        <a href="{{ URL::route('news.view', $news->id) }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
      </div>
      <form action="{{ URL::route('news.destroy', $news->id) }}" method="post">
        <input type="submit" class="btn btn-danger" value="{{ trans('common.delete') }}">
      </form>
    </div>
  @else
    <p class="no-result">{{ trans('no-such-news-item') }}</p>
  @endif
@stop
