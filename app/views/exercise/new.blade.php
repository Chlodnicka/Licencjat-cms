@section('content')
  <h1>{{ trans('app.exercise-new') }}</h1>
  <div class="new exercise">
    {{ Form::open(array('route' => array('exercise.create'))) }}
    <div class="form-cluster">
      <div class="form-group">
        {{ Form::label('title', Lang::get('common.title'))}}
        {{ Form::text('title', Input::old('title')) }}
        @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
      </div>
      <div class="form-group">
        {{ Form::label('content', Lang::get('common.content'))}}
        {{ Form::textarea('content', Input::old('content'), array('id'=>'editor')) }}
      </div>
      <div class="form-group"><!--trzeba zrobić odrębne dodawanie rozwiązania!-->
        {{ Form::label('solution', Lang::get('common.solution'))}}
        {{ Form::textarea('solution', Input::old('solution'), array('id'=>'editor')) }}}
      </div>
      <div class="form-group">
        {{ Form::label('solutionAccess', Lang::get('common.solution-access'))}}
        {{ Form::checkbox('solution_access', '1', true) }}
      </div>
      {{ Form::label('difficulty',Lang::get('common.difficulty')) }}
      {{ Form::select('difficulty', $difficulty) }}
      @if ($errors->has('difficulty')) <p class="help-block">{{ $errors->first('difficulty') }}</p> @endif
      {{ Form::label('courses', Lang::get('common.select-courses')) }}
      {{ Form::select('courses', $courses) }}
      @if ($errors->has('courses')) <p class="help-block">{{ $errors->first('courses') }}</p> @endif
      {{ Form::label('lectures', Lang::get('common.select-lectures')) }}
      {{ Form::select('lectures', [Lang::get('common.first-choose-course')]) }}
      @if ($errors->has('lectures')) <p class="help-block">{{ $errors->first('lectures') }}</p> @endif
      {{ Form::label('tags', Lang::get('common.tags-category')) }}
      {{ Form::select('tags[]', ($tags), null, ['multiple'=>true,'class' => 'form-control margin']) }}
              <!--tagi-->
      {{ Form::submit(Lang::get('common.submit')) }}
    </div>
    {{ Form::close() }}
  </div>
@stop
