@section('content')
  <h1>{{ trans('app.students-list') }}</h1>
  @if(!empty($course->name))
      <h2>{{ $course->name }}</h2>
  @endif
  @if(!empty($students))
      <ul>
          @foreach($students as $student)
            <li>{{ $student->firstname }} {{ $student->lastname }}, {{ $student->email }}</li>
          @endforeach
      </ul>
   @endif
@stop
