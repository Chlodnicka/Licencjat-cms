@section('content')
<div class="list">
  <h1>Course! Index</h1>
  <p class="lead">{{ $courses_lead->lead }}</p>
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
<aside>
  <ul>
    @foreach( $courses as $course)
      <a href="{{ URL::route('course.view', $course->id) }}"><li>{{ $course->name }}</li></a>
    @endforeach
  </ul>
</aside>
@stop
