@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">{{ trans('app.course-delete') }} {{ $course->name }}</h1>
    </div>
  </div>
  @if (!empty($course))
    <div class="delete course">
      <p class="lead">{{ trans('app.course-delete-message') }}</p>
      <div class="action-button">
        <a href="{{ URL::route('course.view', $course->id) }}" class="btn btn-default btn-back"><i class="fa fa-long-arrow-left"></i>  {{ trans('common.back') }} </a>
      </div>
      <form action="{{ URL::route('course.destroy', $course->id) }}" method="post">
        <input type="submit" class="btn btn-danger" value="{{ trans('common.delete') }}">
      </form>
    </div>
  @else
    <p class="no-result">{{ trans('app.no-such-course') }}</p>
  @endif
@stop
