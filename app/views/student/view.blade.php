@section('content')
  <h1>Student! View</h1>
  <h2>{{ $student->firstname }} {{ $student->lastname }}</h2>
  <p class="email"><a href="mailto:{{ $student->email }}">{{ $student->email }}</a></p>
  <p class="courses">Kursy</p>
  <ul>
    <li>{{ $student->course->name }}</li>
  </ul>
@stop
