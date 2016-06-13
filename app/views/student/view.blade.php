@section('content')

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.students') }}</h1>
    </div>
  </div>
  @if($actions == 1)
    <div class="action-button">
      <a class="btn btn-primary" href="{{ URL::route('student.edit', $students->id) }}">{{ trans('common.edit') }}</a>
      <a class="btn btn-primary" href="{{ URL::route('user.change_password') }}">{{ trans('common.change_password') }}</a>
      <a class="btn btn-danger" href="{{ URL::route('student.delete', $students->id) }}">{{ trans('common.delete') }}</a>
    </div>
  @endif
  @if(!empty($students))
    @if(!empty($students->firstname) && !empty($students->lastname))
      <h2>{{ $students->firstname }} {{ $students->lastname }}</h2>
    @endif
    @if(!empty($students->email))
      <p class="email"><a href="mailto:{{ $students->email }}">{{ $students->email }}</a></p>
    @endif
    <p class="courses">{{ trans('app.courses') }}</p>
    <ul>
      @foreach($student_courses as $course)
        <li>{{ $course->name }}</li>
      @endforeach
    </ul>
  @endif
@stop
