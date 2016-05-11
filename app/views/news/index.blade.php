@section('content')
  <h1>{{ trans('app.news-list') }}</h1>
  @if(!empty($news_lead->lead))
    <p class="lead">{{ $news_lead->lead }}</p>
  @endif
  <div class="action-buttons">
    <a href="{{ URL::route('news.new') }}">{{ trans('common.new') }}</a>
  </div>
  @if(!empty($news))
    <div class="content news">
      @foreach ($news as $newsItem)
        <a href="{{ URL::route('news.view', $newsItem->id) }}">
          <div class="box-item">
            <div class="box-img">
              <img src="http://placehold.it/400x400">
            </div>
            @if(!empty($newsItem->title))
              <h2 class="title">{{ $newsItem->title }}</h2>
            @endif
            @if(!empty($newsItem->date))
              <p class="date">{{ $newsItem->date }}</p>
            @endif
            @if(!empty($newsItem->lead))
              <p class="item-lead">{{ $newsItem->lead }}</p>
            @endif
            <a href="{{ URL::route('news.view', $newsItem->id) }}" class="btn btn-more">{{ trans('common.see-more') }} <i class="fa fa-long-arrow-right"></i></a>
          </div>
        </a>
        @endforeach
          <?php echo $news->links(); ?>
    </div>

  @endif
@stop
