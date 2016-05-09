@section('content')
  <h1>{{ trans('app.news-delete') }} {{ $news->title }}</h1>
  @if(!empty($news))
    <div class="delete news">
      <p class="lead">{{ trans('app.news-delete-message') }}</p>
      <a href="#" class="btn btn-back">{{ trans('common.back') }}</a>
      <form action="{{ URL::route('news.destroy', $news->id) }}" method="post">
        <input type="submit" class="btn btn-delete" value="{{ trans('common.delete') }}">
      </form>
    </div>
  @else
    <p class="no-result">{{ trans('no-such-news-item') }}</p>
  @endif
@stop
