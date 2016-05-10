@section('content')
  <h1>{{ trans('student-edit') }}</h1>
  @if(!empty($student))
    <div class="student-form">
      <form action="{{ URL::route('student.update', $student->id) }}" method="post">
        <div class="form-group">
          <div><label for="fistname">{{ trans('common.firstname') }}</label><input type="text" name="firstname" id="firstname"></div>
          <div><label for="lastname">{{ trans('common.lastname') }}</label><input type="text" name="lastname" id="lastname"></div>
        </div>
        <div class="form-group">
          <div><label for="email">{{ trans('common.email') }}</label><input type="email" name="email" id="email"></div>
          <div>
            <label for="course">{{ trans('app.course') }}</label>
            <select name="course" id="course"><!--do wymiany!-->
              <option value="1">Volvo</option>
              <option value="2">Saab</option>
              <option value="3">Mercedes</option>
              <option value="4">Audi</option>
            </select>
          </div>
        </div>
        <input type="submit" value="{{ trans('common.submit') }}">
      </form>
    </div>
  @else
    <p class="no-result">{{ trans('app.no-such-student') }}</p>
  @endif
@stop
