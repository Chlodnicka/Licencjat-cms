@section('content')
  <h1>Exercise! New</h1>
  <div class="new exercise">
    {{ Form::open(array('route' => array('exercise.create'))) }}
    <div class="form-cluster">
      <div class="form-group">
        {{ Form::label('title', 'Tytuł')}}
        {{ Form::text('title') }}
      </div>
      <div class="form-group">
        {{ Form::label('content', 'Treść')}}
        {{ Form::textarea('content') }}
      </div>
      <div class="form-group">
        {{ Form::label('solution', 'Rozwiązanie')}}
        {{ Form::textarea('solution') }}
      </div>
      <div class="form-group">
        {{ Form::label('solutionAccess', 'Dostępność rozwiązania dla studentów')}}
        {{ Form::checkbox('solution_access', '1', true) }}
      </div>
      {{ Form::label('difficulty','Trudność:') }}
      {{ Form::select('difficulty', $difficulty) }}
      {{ Form::label('courses','Select Course:') }}
      {{ Form::select('courses', $courses) }}
      {{ Form::label('lectures','Select Course:') }}
      {{ Form::select('lectures', $lectures) }}
      {{ Form::label('tags','Select Category:') }}
      {{ Form::select('tags[]', ($tags), null, ['multiple'=>true,'class' => 'form-control margin']) }}
              <!--tagi-->
      {{ Form::submit('Submit') }}
    </div>
    {{ Form::close() }}
  </div>
@stop
