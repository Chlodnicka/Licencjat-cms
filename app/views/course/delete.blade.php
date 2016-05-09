@section('content')
  <h1>{{ trans('course-delete') }} {{ $course->name }}</h1>
  @if (!empty($course))
    <div class="delete course">
      <p class="lead">{{ trans('app.course-delete-message') }}</p>
      <a href="#" class="btn btn-back">{{ trans('common.back') }}</a>
      <form action="{{ URL::route('course.destroy', $course->id) }}" method="post">
        <input type="submit" class="btn btn-delete" value="{{ trans('common.delete') }}">
      </form>
    </div>
  @else
    <p class="no-result">{{ trans('app.no-such-course') }}</p>
  @endif
@stop
