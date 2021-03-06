@section('content')
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header title">{{ trans('app.students-list') }}</h1>
      </div>
  </div>
  @if(!empty($course->name))
      <h2>{{ $course->name }}</h2>
  @endif
  @if(!empty($students))
      <ul>
          @foreach($students as $student)
            <li><a href="{{ URL::route('student.view', $student->id) }}">{{ $student->firstname }} {{ $student->lastname }}, {{ $student->email }}</a></li>
          @endforeach
              <?php echo $students->links(); ?>
      </ul>
   @endif
@stop
