@section('content')

  @if(!empty($student))

    <div class="student-form single-page">
        <h1>{{ trans('app.student-edit') }}</h1>
        <div class="action-button">
            <a class="btn btn-primary btn-back" href="{{ URL::route('student.view', $student->id) }}"><i class="fa fa-long-arrow-left"></i> {{ trans('common.back') }}</a>
        </div>
      <form action="{{ URL::route('student.update', $student->id) }}" method="post">
        <div class="form-group">
            <label for="fistname">{{ trans('common.firstname') }}</label>
            <input type="text" name="firstname" id="firstname" value="{{ $student->firstname }}">
            @if ($errors->has('firstname')) <p class="help-block">{{ $errors->first('firstname') }}</p> @endif
        </div>
        <div class="form-group">
            <label for="lastname">{{ trans('common.lastname') }}</label>
            <input type="text" name="lastname" id="lastname" value="{{ $student->lastname }}">
            @if ($errors->has('lastname')) <p class="help-block">{{ $errors->first('lastname') }}</p> @endif
        </div>
        <div class="form-group">
            <label for="email">{{ trans('common.email') }}</label>
            <input type="email" name="email" id="email" value="{{ $student->email }}">
            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
        </div>
        <div class="form-group">
            {{ Form::label('courses', Lang::get('common.select-courses')) }}
            {{ Form::select('courses[]', ($courses), $student_courses, ['multiple'=>true,'class' => 'form-control margin']) }}
            @if ($errors->has('courses')) <p class="help-block">{{ $errors->first('courses') }}</p> @endif
        </div>
        <input type="submit" value="{{ trans('common.submit') }}">
      </form>
    </div>
  @else
    <p class="no-result">{{ trans('app.no-such-student') }}</p>
  @endif
@stop
