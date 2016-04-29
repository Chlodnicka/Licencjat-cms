@section('content')
  <h1>Lecture! Edit</h1>
  <div class="edit lecture">
    {{ Form::open(array('route' => array('lecture.update', $lecture->id))) }}
    <div class="form-cluster">
      <div class="form-group">
        {{ Form::label('title', 'Tytuł')}}
        {{ Form::text('title', $lecture->title) }}
      </div>
      <div class="form-group">
        {{ Form::label('lead', 'Lead')}}
        {{ Form::text('lead', $lecture->lead) }}
      </div>
      <div class="form-group">
        {{ Form::label('content', 'Treść')}}
        {{ Form::textarea('content', $lecture->content, array('id'=>'editor')) }}
      </div>
      {{ Form::label('courses','Select Course:') }}
      {{ Form::select('courses', $courses, $lecture->course_id) }}
      {{ Form::label('tags','Select Category:') }}
      {{ Form::select('tags[]', ($tags), ($lecture_tags), ['multiple'=>true,'class' => 'form-control margin']) }}
              <!--tagi-->
      {{ Form::submit('Submit') }}
    </div>
    {{ Form::close() }}
  </div>
@stop
