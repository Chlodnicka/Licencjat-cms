@section('content')
    <div class="home">
        <div class="news-and-information">
            @if(is_object($news))
                <div class="news">
                    <h1>{{ trans('app.news') }}</h1>
                    <div class="content-news">
                        @foreach ($news as $newsItem)
                            <a href="{{ URL::route('news.view', $newsItem->id) }}">
                                <div class="news-item">
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
            @endif
            @if(is_object($owner))
                <div class="information">
                    <div class="personal">
                        <h2 class="name">{{ $position }} {{ $owner->firstname }} {{ $owner->lastname }}</h2>
                        @if(!empty($owner->institute))
                            <p class="institute">{{ trans('app.institute') }}: {{ $owner->institute }}</p>
                        @endif
                        @if(!empty($owner->department))
                            <p class="department">{{ trans('app.department') }}: {{ $owner->department }}</p>
                        @endif
                        @if(!empty($owner->university))
                            <p class="university">{{ trans('app.university') }}: {{ $owner->university }}</p>
                        @endif
                        @if(!empty($owner->email))
                            <p class="email"><a href="mailto:{{ $owner->email }}">{{ trans('app.email') }}: {{ $owner->email }}</a></p>
                        @endif
                        @if(!empty($owner->phone))
                            <p class="phone"><a href="tel:+48 {{ $owner->phone }}">{{ trans('app.phone') }}: +48 {{ $owner->phone }}</a></p>
                        @endif
                    </div>
                    <a class="btn btn-more" href="{{ URL::route('owner.index') }}">{{ trans('common.see-more') }} <i class="fa fa-long-arrow-right"></i></a>
                </div>
                @endif
        </div>

        @if(is_object($courses))
            <div class="courses">
                    <h1>{{ trans('app.courses') }}</h1>
                    <div class="content-course">
                        @foreach( $courses as $course)
                            <a href="{{ URL::route('course.view', $course->id) }}">
                                <div class="course-item">
                                    <h2 class="title">{{ $course->name }}</h2>
                                    <p class="item-lead"><?php $lead = str_limit($course->lead, 200);?>{{ $lead }}</p>
                                    <a href="{{ URL::route('course.view', $course->id) }}" class="btn btn-more">Zobacz więcej <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </a>
                        @endforeach
                    </div>
            </div>
        @endif
    </div>
@stop
