@section('content')
  <h1>{{ trans('app.exercise-new') }}/h1>
  <div class="new exercise">
    {{ Form::open(array('route' => array('exercise.create'))) }}
    <div class="form-cluster">
      <div class="form-group">
        {{ Form::label('title', Lang::get('common.title'))}}
        {{ Form::text('title') }}
      </div>
      <div class="form-group">
        {{ Form::label('content', Lang::get('common.content'))}}
        {{ Form::textarea('content', null, array('id'=>'editor')) }}
      </div>
      <div class="form-group"><!--trzeba zrobić odrębne dodawanie rozwiązania!-->
        {{ Form::label('solution', Lang::get('common.solution'))}}
        {{ Form::textarea('solution', null, array('id'=>'editor')) }}}
      </div>
      <div class="form-group">
        {{ Form::label('solutionAccess', Lang::get('common.solution-access'))}}
        {{ Form::checkbox('solution_access', '1', true) }}
      </div>
      {{ Form::label('difficulty',Lang::get('common.difficulty')) }}
      {{ Form::select('difficulty', $difficulty) }}
      {{ Form::label('courses', Lang::get('common.select-courses')) }}
      {{ Form::select('courses', $courses) }}
      {{ Form::label('lectures', Lang::get('common.select-lectures')) }}
      {{ Form::select('lectures', [Lang::get('common.first-choose-course')]) }}
      {{ Form::label('tags', Lang::get('common.tags-category')) }}
      {{ Form::select('tags[]', ($tags), null, ['multiple'=>true,'class' => 'form-control margin']) }}
              <!--tagi-->
      {{ Form::submit(Lang::get('common.submit')) }}
    </div>
    {{ Form::close() }}
  </div>
@stop
