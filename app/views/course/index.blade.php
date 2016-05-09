@section('content')
<div class="list">
  <h1>Course! Index</h1>
  @if (!empty($courses_lead))
    <p class="lead">{{ $courses_lead->lead }}</p>
  @endif
  <a href="{{ URL::route('course.new') }}">Nowy</a>
  <div class="content course">
    @foreach( $courses as $course)
      <div class="list-item">
        @if (!empty($course->name))
         <h2 class="title">{{ $course->name }}</h2>
        @endif
        @if (!empty($course->lead))
          <p class="item-lead">{{$course->lead}}</p>
          @endif
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
