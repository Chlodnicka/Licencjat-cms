@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.exercise-new') }}</h1>
    </div>
  </div>
  <div class="new exercise">
      <div class="action-buttons">
        <a href="{{ URL::route('exercise.index') }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
      </div>
    {{ Form::open(array('route' => array('exercise.create'))) }}
    <div class="form-cluster">
      <div class="form-group">
        {{ Form::label('title', Lang::get('common.title').'*')}}
        {{ Form::text('title', Input::old('title')) }}
        @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
      </div>
      <div class="form-group">
        <input id="access" type="checkbox" name="access" value="1"><label for="access"><span>{{ trans('common.exercise-access') }}</span></label>
      </div>
      <div class="form-group">
        {{ Form::label('content', Lang::get('common.content'))}}
        {{ Form::textarea('content', Input::old('content'), array('id'=>'editor')) }}
      </div>
      <div class="form-group">
        {{ Form::label('solution', Lang::get('common.solution'))}}
        {{ Form::textarea('solution', Input::old('solution'), array('id'=>'solution')) }}
      </div>
      <div class="form-group">
        <input id="solution_access" type="checkbox" name="solution_access" checked="checked" value="1"><label for="solution_access"><span>{{ trans('common.solution-access') }}</span></label>
      </div>
      <div class="form-group">
        {{ Form::label('difficulty',Lang::get('common.difficulty').'*') }}
        {{ Form::select('difficulty', $difficulty) }}
        @if ($errors->has('difficulty')) <p class="help-block">{{ $errors->first('difficulty') }}</p> @endif
      </div>
      <div class="form-group">
        {{ Form::label('courses', Lang::get('common.select-courses').'*') }}
        {{ Form::select('courses', $courses) }}
        @if ($errors->has('courses')) <p class="help-block">{{ $errors->first('courses') }}</p> @endif
      </div>
      <div class="form-group">
        {{ Form::label('lectures', Lang::get('common.select-lectures')) }}
        {{ Form::select('lectures', [Lang::get('common.first-choose-course')]) }}
        @if ($errors->has('lectures')) <p class="help-block">{{ $errors->first('lectures') }}</p> @endif
      </div>
      <div class="form-group">
        {{ Form::label('tags', Lang::get('common.tags-category')) }}
        {{ Form::select('tags[]', ($tags), null, ['multiple'=>true,'class' => 'form-control margin']) }}
      </div>

              <!--tagi-->
      {{ Form::submit(Lang::get('common.submit')) }}
    </div>
    {{ Form::close() }}
  </div>
@stop
