@section('content')
  <h1>{{ trans('app.student') }}</h1>
  <div class="action-button">
    <a href="{{ URL::route('student.delete', $students->id) }}">Usuń</a>
    <a href="{{ URL::route('student.edit', $students->id) }}">Edytuj</a>
  </div>
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
