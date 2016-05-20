@section('content')
  <h1>{{ trans('app.student-new') }}</h1>
  <p class="lead">{{ $students_lead->lead }}</p>
  <div class="student-form">
    <form action="{{ URL::route('student.create') }}" method="post">
      <div class="form-group">
        <div>
          <label for="fistname">{{ trans('common.firstname') }}</label>
          <input type="text" name="firstname" id="firstname"  value="{{ Input::old('firstname') }}">
          @if ($errors->has('firstname')) <p class="help-block">{{ $errors->first('firstname') }}</p> @endif
        </div>
        <div>
          <label for="lastname">{{ trans('common.lastname') }}</label>
          <input type="text" name="lastname" id="lastname" value="{{ Input::old('lastname') }}">
          @if ($errors->has('lastname')) <p class="help-block">{{ $errors->first('lastname') }}</p> @endif
        </div>
      </div>
      <div class="form-group">
        <div>
          <label for="email">{{ trans('common.email') }}</label>
          <input type="email" name="email" id="email" value="{{ Input::old('email') }}">
          @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
        </div>
        {{ Form::label('courses', Lang::get('common.select-course')) }}
        {{ Form::select('courses', $courses) }}
        @if ($errors->has('courses')) <p class="help-block">{{ $errors->first('courses') }}</p> @endif
      </div>
      <input type="submit" value="{{ trans('common.submit') }}">
    </form>
  </div>
@stop
