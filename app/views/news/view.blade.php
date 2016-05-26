@section('content')
<div class="content news single-page">
  @if(!empty($news))
        @if($actions == 1)
            <div class="action-buttons">
              <a href="{{ URL::route('news.new') }}">{{ trans('common.new') }}</a>
              <a href="{{ URL::route('news.edit', $news->id) }}">{{ trans('common.edit') }}</a>
              <a href="{{ URL::route('news.delete', $news->id) }}">{{ trans('common.delete') }}</a>
            </div>
        @endif
    @if(!empty($news->title))
      <h1 class="title">{{ $news->title }}</h1>
    @endif
    @if(!empty($news->lead))
      <p class="lead">{{ $news->lead }}</p>
    @endif
    @if(!empty($news->date))
      <p class="date">{{ $news->date }}</p>
    @endif
    @if(!empty($news->content))
      <div class="richtext">
        {{ $news->content }}
      </div>
    @endif
    <p class="author">{{ $news->author->firstname }} {{ $news->author->lastname }}</p>
    <a href="{{ URL::route('news.index') }}" class="btn btn-back"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
  @else
    <p class="no-result">{{ trans('app.no-such-news-item') }}</p>
  @endif
</div>
@stop
