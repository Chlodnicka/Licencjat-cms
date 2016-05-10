@section('content')
  <h1>{{ trans('app.student-new') }}</h1>
  <p class="lead">{{ $students_lead->lead }}</p>
  <div class="student-form">
    <form action="{{ URL::route('student.create') }}" method="post">
      <div class="form-group">
        <div><label for="fistname">{{ trans('common.firstname') }}</label><input type="text" name="firstname" id="firstname"></div>
        <div><label for="lastname">{{ trans('common.lastname') }}</label><input type="text" name="lastname" id="lastname"></div>
      </div>
      <div class="form-group">
        <div><label for="email">{{ trans('common.email') }}</label><input type="email" name="email" id="email"></div>
        {{ Form::label('courses', Lang::get('common.select-course')) }}
        {{ Form::select('courses', $courses) }}
      </div>
      <input type="submit" value="{{ trans('common.submit') }}">
    </form>
  </div>
@stop
