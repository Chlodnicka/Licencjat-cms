@section('content')
  <h1>Exercise! Edit</h1>
  @if(!empty($exercise))
    <div class="edit exercise">
        {{ Form::open(array('route' => array('exercise.update', $exercise->id))) }}
        <div class="form-cluster">
          <div class="form-group">
            {{ Form::label('title', 'Tytuł')}}
            {{ Form::text('title', $exercise->title) }}
          </div>
          <div class="form-group">
            {{ Form::label('content', 'Treść')}}
            {{ Form::textarea('content', $exercise->content, array('id'=>'editor')) }}
          </div>
          <div class="form-group">
            {{ Form::label('solution', 'Rozwiązanie')}}
            {{ Form::textarea('solution', $exercise->solution, array('id'=>'editor')) }}
          </div>
          <div class="form-group">
            {{ Form::label('solutionAccess', 'Dostępność rozwiązania dla studentów')}}
            {{ Form::checkbox('solution_access', $exercise->solution_access, true) }}
          </div>
          {{ Form::label('difficulty','Trudność:') }}
          {{ Form::select('difficulty', $difficulty, $exercise->difficulty) }}
          {{ Form::label('courses','Select Course:') }}
          {{ Form::select('courses', $courses, $exercise->course_id) }}

          {{ Form::label('lectures','Select Course:') }}
          {{ Form::select('lectures', ['Najpierw wybierz kurs']) }}

          {{ Form::label('tags','Select Category:') }}
          {{ Form::select('tags[]', ($tags), null, ['multiple'=>true,'class' => 'form-control margin']) }}
                  <!--tagi-->
          {{ Form::submit('Submit') }}
        </div>
        {{ Form::close() }}
    </div>
  @else
    <p class="no-result">Dane ćwiczenie nie istnieje</p>
  @endif
@stop
