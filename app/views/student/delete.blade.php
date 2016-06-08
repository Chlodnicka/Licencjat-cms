@section('content')
  @if(!empty($student))
    <div class="delete student-delete">
      <h1>{{ trans('app.student-delete') }}</h1>
      <p class="lead">{{ trans('app.student-delete-message') }}</p>
      <a href="" class="btn btn-primary btn-back"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
      <form action="{{ URL::route('student.destroy', $student->id) }}" method="post">
        <input type="submit" class="btn btn-danger" value="{{ trans('common.delete') }}">
      </form>
    </div>
  @else
    <p class="no-result">{{ trans('app.no-such-student') }}</p>
  @endif
@stop
