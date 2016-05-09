@section('content')
    <div class="search list">
        <h1>Search! Index</h1>
        <div class="search-list">
            <div class="categories">
                @if(!empty($courses))
                    <a href="#courses"><p class="search-category">Kursy</p></a>
                @endif
                @if(!empty($lectures))
                    <a href="#lectures"><p class="search-category">Wykłady</p></a>
                @endif
                @if(!empty($exercises))
                    <a href="#exercises"><p class="search-category">Zadania</p></a>
                @endif
                @if(!empty($news))
                    <a href="#news"><p class="search-category">Aktualności</p></a>
                @endif
            </div>
            @if(!empty($courses))
            <div id="courses">
                <h3>Kursy</h3>
                @foreach($courses as $course)
                    <div class="list-item">
                        <h2 class="title">{{ $course->name }}</h2>
                        <p class="item-lead">{{ $course->lead }}</p>
                        <!--tubędzieczęśctekstu-->
                        <a href="{{ URL::route('course.view', $course->id) }}" class="btn btn-more">Zobacz więcej <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                    <div class="clearfix"></div>
                @endforeach
            </div>
            @endif
            @if(!empty($lectures))
            <div id="lectures">
                <h3>Wykłady</h3>
                @foreach($lectures as $lecture)
                    <div class="list-item">
                        <h2 class="title">{{ $lecture->title }}</h2>
                        <p class="item-lead">{{ $lecture->lead }}</p>
                        <a href="{{ URL::route('lecture.view', $lecture->id) }}" class="btn btn-more">Zobacz więcej <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                    <div class="clearfix"></div>
                @endforeach
            </div>
            @endif
            @if(!empty($exercises))
            <div id="exercises">
                <h3>Zadania</h3>
                @foreach($exercises as $exercise)
                    <div class="list-item">
                        <h2 class="title">{{ $exercise->title }}</h2>
                        <p class="item-lead">{{ $exercise->content }}</p>
                        <a href="{{ URL::route('exercise.view', $exercise->id) }}" class="btn btn-more">Zobacz więcej <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                    <div class="clearfix"></div>
                @endforeach
            </div>
            @endif
            @if(!empty($news))
            <div id="news">
                <h3>Aktualności</h3>
                @foreach($news as $newsItem)
                    <div class="list-item">
                        <h2 class="title">{{ $newsItem->title }}</h2>
                        <p class="item-lead">{{ $newsItem->lead }}</p>
                        <a href="{{ URL::route('news.view', $newsItem->id) }}" class="btn btn-more">Zobacz więcej <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                    <div class="clearfix"></div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
@stop
