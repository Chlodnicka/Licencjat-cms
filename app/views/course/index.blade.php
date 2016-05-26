@section('content')
<div class="list">
  <h1>{{ trans('app.list-of-courses') }}</h1>
  @if (!empty($courses_lead))
    <p class="lead">{{ $courses_lead->lead }}</p>
  @endif
  @if ($actions == 1)
    <div class="action-buttons">
      <a href="{{ URL::route('course.new') }}">{{ trans('common.new') }}</a>
    </div>
  @endif
  <div class="content course">
    @foreach( $courses as $course)
      <div class="list-item">
        @if (!empty($course->name))
         <h2 class="title">{{ $course->name }}</h2>
        @endif
        @if (!empty($course->lead))
          <p class="item-lead">{{$course->lead}}</p>
          @endif
          <a href="{{ URL::route('course.view', $course->id) }}" class="btn btn-more">{{ trans('common.see-more') }} <i class="fa fa-long-arrow-right"></i></a>
      </div>
      <div class="clearfix"></div>
    @endforeach
      <?php echo $courses->links(); ?>
  </div>
</div>
@stop
