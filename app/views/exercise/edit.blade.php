@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.exercise-edit') }} {{ $exercise->title }}</h1>
    </div>
  </div>
  @if(!empty($exercise))
    <div class="edit exercise">
        <div class="action-buttons">
          <a href="{{ URL::route('exercise.view', $exercise->id) }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
        </div>
        {{ Form::open(array('route' => array('exercise.update', $exercise->id))) }}
        <div class="form-cluster">
          <div class="form-group">
            {{ Form::label('title', Lang::get('common.title'))}}
            {{ Form::text('title', $exercise->title) }}
            @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
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
            <input id="solution_access" type="checkbox" name="solution_access" checked="checked" value="1"><label for="solution_access"><span>{{ trans('common.solution-access') }}</span></label>
          </div>
          <div class="form-group">
            {{ Form::label('difficulty',Lang::get('common.difficulty')) }}
            {{ Form::select('difficulty', $difficulty, $exercise->difficulty) }}
            @if ($errors->has('difficulty')) <p class="help-block">{{ $errors->first('difficulty') }}</p> @endif
          </div>
          <div class="form-group">
            {{ Form::label('courses',Lang::get('common.select-courses')) }}
            {{ Form::select('courses', $courses, $exercise->course_id) }}
            @if ($errors->has('courses')) <p class="help-block">{{ $errors->first('courses') }}</p> @endif
          </div>
          <div class="form-group">
            {{ Form::label('lectures',Lang::get('common.select-lectures')) }}
            <select name="lectures" id="lectures">
              <option value="0" @if($exercise->lecture_id == 0)
              selected
                      @endif>Brak wykładu</option>
              @foreach($lectures as $lecture)
                <option value="{{ $lecture->id }}"
                        @if($lecture->id == $exercise->lecture_id)
                        selected
                        @endif>
                  {{ $lecture->title }}
                </option>
              @endforeach
            </select>
            @if ($errors->has('lectures')) <p class="help-block">{{ $errors->first('lectures') }}</p> @endif
          </div>
          <div class="form-group">
            {{ Form::label('tags',Lang::get('common.tags-category')) }}
            {{ Form::select('tags[]', ($tags), $exercise_tags, ['multiple'=>true,'class' => 'form-control margin']) }}
          </div>

          {{ Form::submit(Lang::get('common.submit')) }}
        </div>
        {{ Form::close() }}
    </div>
  @else
    <p class="no-result">{{ trans('app.no-such-exercise') }}</p>
  @endif
@stop
