@section('content')
  <h1>{{ trans('app.student-delete') }}</h1>
  @if(!empty($student))
    <div class="delete">
      <p class="lead">{{ trans('app.student-delete-message') }}</p>
      <a href="" class="btn btn-back">{{ trans('common.back') }}</a>
      <form action="{{ URL::route('student.destroy', $student->id) }}" method="post">
        <input type="submit" class="btn btn-delete" value="{{ trans('common.delete') }}">
      </form>
    </div>
  @else
    <p class="no-result">{{ trans('app.no-such-student') }}</p>
  @endif
@stop
