@section('content')

<div class="content news single-page">
  @if(!empty($news))
        @if(!empty($news->title))
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header title">{{ $news->title }}</h1>
                </div>
            </div>
        @endif
        @if($actions == 1)
            <div class="action-buttons">

                <a href="{{ URL::route('news.index') }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
                <a class="btn btn-primary" href="{{ URL::route('news.new') }}">{{ trans('common.new') }}</a>
              <a class="btn btn-primary" href="{{ URL::route('news.edit', $news->id) }}">{{ trans('common.edit') }}</a>
              <a class="btn btn-danger" href="{{ URL::route('news.delete', $news->id) }}">{{ trans('common.delete') }}</a>
            </div>
        @endif
    @if(!empty($news->lead))
      <p class="lead">{{ $news->lead }}</p>
    @endif
    @if(!empty($news->date))
      <p class="date">{{ $news->date }}</p>
    @endif
    @foreach($attachment as $item)
                {{ HTML::image($item->url, $item->description) }}
    @endforeach
    @if(!empty($news->content))
      <div class="richtext">
        {{ $news->content }}
      </div>
    @endif
            @if($actions != 1)
        <p class="author">{{ $news->author->firstname }} {{ $news->author->lastname }}</p>
                <a href="{{ URL::route('news.index') }}" class="btn btn-primary"><i class="fa fa-long-arrow-left back"></i>{{ trans('common.back') }}</a>

            @endif
  @else
    <p class="no-result">{{ trans('app.no-such-news-item') }}</p>
  @endif
</div>
@stop
