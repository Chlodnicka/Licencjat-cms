@section('content')
    <div class="home">
        <div class="author">
            <p>{{ $owner->firstname }}</p>
            <p>{{ $owner->lastname }}</p>
            <p>{{ $owner->email }}</p>
        </div>
        <div class="news">
            <h1>News! Index</h1>
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
        </div>
        <div class="courses">
            <div class="list">
                <h1>Course! Index</h1>
                <div class="content course">
                    @foreach( $courses as $course)
                        <div class="list-item">
                            <h2 class="title">{{ $course->name }}</h2>
                            <p class="item-lead">{{$course->lead}}</p>
                            <a href="{{ URL::route('course.view', $course->id) }}" class="btn btn-more">Zobacz więcej <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                        <div class="clearfix"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
