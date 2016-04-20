@section('content')
  <h1>Student! Index</h1>
  <h2>{{ $course->name }}</h2>
  <ul>
      @foreach($students as $student)
        <li>{{ $student->firstname }} {{ $student->lastname }}, {{ $student->email }}</li>
      @endforeach
  </ul>
@stop
