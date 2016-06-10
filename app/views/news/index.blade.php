@section('content')

    @if(!empty($news))
    <div class="content news single-page">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header title">{{ trans('app.news-list') }}</h1>
            </div>
        </div>
        @if(!empty($news_lead->lead) && $actions != 1)
            <p class="lead">{{ $news_lead->lead }}</p>
        @endif
        @if($actions == 1)
            <div class="action-buttons">
                <a href="{{ URL::route('dashboard') }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>

                <a class="btn btn-primary" href="{{ URL::route('news.new') }}">{{ trans('common.new') }}</a>
            </div>
        @endif
      @foreach ($news as $newsItem)
          <div class="box-item list-item">
            <div class="box-img">
              <?php $attachment = DB::table('attachments')->where('id', '=', $newsItem->attachment_id)->get();?>
              @foreach($attachment as $item)
                {{ HTML::image($item->url, $item->description) }}
              @endforeach
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
            <a href="{{ URL::route('news.view', $newsItem->id) }}" class="btn btn-default">{{ trans('common.see-more') }} <i class="fa fa-long-arrow-right"></i></a>
          </div>
        @endforeach
          <?php echo $news->links(); ?>
    </div>

  @endif
@stop
