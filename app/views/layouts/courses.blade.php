<ul>
    @foreach($courses as $course)
        <li>{{ HTML::linkRoute("course.view", $course->name, $course->id, array()) }}</li>
    @endforeach
</ul>