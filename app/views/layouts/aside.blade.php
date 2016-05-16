 <ul>
     @foreach($courses as $course)
        <a href="{{ URL::route('course.view', $course->id) }}">
            <li>
                {{ $course->name }}
            </li>
        </a>
     @endforeach
  </ul>


