@section('content')
    <div class="home">
        <div class="news">
            <h1>{{ trans('app.news') }}</h1>
            <div class="content-news">
                @foreach ($news as $newsItem)
                    <a href="{{ URL::route('news.view', $newsItem->id) }}">
                    <div class="box-item">
                        <div class="box-img">
                            
                        </div>
                            <h2 class="title">{{ $newsItem->title }}</h2>
                            <p class="date">{{ $newsItem->date }}</p>
                            <a href="{{ URL::route('news.view', $newsItem->id) }}" class="btn btn-more">Zobacz więcej <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="courses">
                <h1>{{ trans('app.courses') }}</h1>
                <div class="content-course">
                    @foreach( $courses as $course)
                        <a href="{{ URL::route('course.view', $course->id) }}">
                            <div class="course-item">
                                <h2 class="title">{{ $course->name }}</h2>
                                <p class="item-lead">{{$course->lead}}</p>
                                <a href="{{ URL::route('course.view', $course->id) }}" class="btn btn-more">Zobacz więcej <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </a>
                    @endforeach
                </div>
        </div>
    </div>
@stop
