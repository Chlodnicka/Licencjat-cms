@section('content')
  <h1>Student! View</h1>
  <div class="action-button">
    <a href="{{ URL::route('students.delete', $student->id) }}">Usuń</a>
  </div>
  @if(!empty($student))
    @if(!empty($student->firstname) && !empty($student->lastname))
      <h2>{{ $student->firstname }} {{ $student->lastname }}</h2>
    @endif
    @if(!empty($student->email))
      <p class="email"><a href="mailto:{{ $student->email }}">{{ $student->email }}</a></p>
    @endif
    <p class="courses">Kursy</p>
    <ul>
      <li>{{ $student->course->name }}</li>
    </ul>
  @endif
@stop
