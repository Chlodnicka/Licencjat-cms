@section('content')
  <h1>Course! Edit</h1>
  @if (!empty($course))
    <div class="edit course">
      {{ Form::open(array('route' => array('course.update', $course->id))) }}
      <div class="form-cluster">
        <div class="form-group">
          {{ Form::label('name', 'Nazwa')}}
          {{ Form::text('name', $course->name) }}
        </div>
        <div class="form-group">
          {{ Form::label('lead', 'Lead')}}
          {{ Form::text('lead', $course->lead) }}
        </div>
        <div class="form-group">
          {{ Form::label('description', 'Opis')}}
          {{ Form::textarea('description', $course->description, array('id'=>'editor')) }}
        </div>
        {{ Form::label('tags','Select Category:') }}
        {{ Form::select('tags[]', ($tags), null, ['multiple'=>true,'class' => 'form-control margin']) }}
        {{ Form::submit('Submit') }}
      </div>
      {{ Form::close() }}
    </div>
  @else
    <p>Dany kurs nie istnieje</p>
  @endif
@stop
