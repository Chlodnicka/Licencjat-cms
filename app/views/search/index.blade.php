@section('content')
    <div class="search list">
        <h1>Search! Index</h1>
        <div class="searchList">
           <!-- @foreach($lectures as $lecture)
                <div class="list-item">
                    <h2 class="title">{{ $lecture->title }}</h2>
                    <p class="item-lead">{{ $lecture->lead }}</p>
                    <a href="{{ URL::route('lecture.view', $lecture->id) }}" class="btn btn-more">Zobacz więcej <i class="fa fa-long-arrow-right"></i></a>
                </div>
                <div class="clearfix"></div>
            @endforeach-->
        </div>
    </div>
@stop
