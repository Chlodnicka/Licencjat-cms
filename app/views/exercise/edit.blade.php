@section('content')
  <h1>{{ trans('app.exercise-edit') }}</h1>
  @if(!empty($exercise))
    <div class="edit exercise">
        {{ Form::open(array('route' => array('exercise.update', $exercise->id))) }}
        <div class="form-cluster">
          <div class="form-group">
            {{ Form::label('title', Lang::get('common.title'))}}
            {{ Form::text('title', $exercise->title) }}
          </div>
          <div class="form-group">
            {{ Form::label('content', Lang::get('common.content'))}}
            {{ Form::textarea('content', $exercise->content, array('id'=>'editor')) }}
          </div>
          <div class="form-group">
            {{ Form::label('solution', Lang::get('common.solution'))}}
            {{ Form::textarea('solution', $exercise->solution, array('id'=>'editor')) }}
          </div>
          <div class="form-group">
            {{ Form::label('solutionAccess', Lang::get('common.solution-access'))}}
            {{ Form::checkbox('solution_access', $exercise->solution_access, true) }}
          </div>
          {{ Form::label('difficulty',Lang::get('common.difficulty')) }}
          {{ Form::select('difficulty', $difficulty, $exercise->difficulty) }}
          {{ Form::label('courses',Lang::get('common.select-courses')) }}
          {{ Form::select('courses', $courses, $exercise->course_id) }}

          {{ Form::label('lectures',Lang::get('common.select-lectures')) }}
          {{ Form::select('lectures', [Lang::get('common.first-choose-course')]) }}

          {{ Form::label('tags',Lang::get('common.tags-category')) }}
          {{ Form::select('tags[]', ($tags), null, ['multiple'=>true,'class' => 'form-control margin']) }}
                  <!--tagi-->
          {{ Form::submit(Lang::get('common.submit')) }}
        </div>
        {{ Form::close() }}
    </div>
  @else
    <p class="no-result">{{ trans('app.no-such-exercise') }}</p>
  @endif
@stop
