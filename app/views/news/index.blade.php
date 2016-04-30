@section('content')
  <h1>News! Index</h1>
  <p class="lead">{{ $news_lead->lead }}</p>
  <div class="content news">
    @foreach ($news as $newsItem)
    <div class="box-item">
      <h2 class="title">{{ $newsItem->title }}</h2>
      <p class="date">{{ $newsItem->date }}</p>
      <p class="item-lead">{{ $newsItem->lead }}</p>
      <a href="{{ URL::route('news.view', $newsItem->id) }}" class="btn btn-more">Zobacz więcej <i class="fa fa-long-arrow-right"></i></a>
    </div>
    @endforeach
  </div>
@stop
