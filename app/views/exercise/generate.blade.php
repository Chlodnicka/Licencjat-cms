@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header title">{{ trans('app.exercise-generate') }}</h1>
        </div>
    </div>
    <div class="exercises">
            <div class="action-buttons">
                <a href="{{ URL::route('course.view', $course_id) }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
            </div>
        <div class="filter-box">
            <h2>{{ trans('common.filter') }}</h2>
            {{ Form::open(array('route' => array('exercise.generate', $course_id))) }}
            <div class="form-cluster">
                <div class="form-group">
                    {{ Form::label('content', Lang::get('common.content'))}}
                    {{ Form::text('content') }}
                    @if ($errors->has('content')) <p class="help-block">{{ $errors->first('content') }}</p> @endif
                </div>
                <div class="form-group">
                    {{ Form::label('number', Lang::get('common.number-of-exercises'))}}
                    {{ Form::number('number', true) }}
                    @if ($errors->has('number')) <p class="help-block">{{ $errors->first('number') }}</p> @endif
                </div>
                <div class="form-group">
                    {{ Form::label('difficulty',Lang::get('common.difficulty')) }}
                    {{ Form::select('difficulty', $difficulty) }}
                </div>
                <div class="form-group">
                    @if(!empty($exercise_lectures))
                        {{ Form::label('exercise_lectures',Lang::get('common.select-lectures')) }}
                        {{ Form::select('exercise_lectures[]', ($exercise_lectures), null, ['multiple'=>true,'class' => 'form-control margin']) }}
                        <p>Aby zaznaczyć więcej niż jedną pozycję przytrzymaj CTRL</p>
                    @endif
                </div>
                <div class="form-group">
                    @if(!empty($exercise_tags))
                        {{ Form::label('exercise_tags',Lang::get('common.tags-category')) }}
                        {{ Form::select('exercise_tags[]', ($exercise_tags), null, ['multiple'=>true,'class' => 'form-control margin']) }}
                        <p>Aby zaznaczyć więcej niż jedną pozycję przytrzymaj CTRL</p>
                    @endif
                </div>

                <!--tagi-->
                {{ Form::submit(Lang::get('common.submit')) }}
            </div>
            {{ Form::close() }}
        </div>
        <div class="exercises-to-Pdf">
            @if(!empty($exercises))
                {{ Form::open(array('route' => array('exercise.generateByInput'))) }}
                <div class="form-group">
                    <input id="answers" type="checkbox" name="answers"
                    checked="checked"><label for="answers"><span>{{ trans('app.generate-with-answers') }}</span></label>
                </div>
                <div class="form-group">
                    {{ Form::label('content', Lang::get('common.content'))}}
                    {{ Form::textarea('content', Input::old('content'), array('id'=>'editor')) }}
                </div>
                @foreach( $exercises as $exercise)
                    <input name="exercises[]" id="exercise{{ $exercise->id }}" type="checkbox" value="{{ $exercise->id }}" checked="checked" />
                    <label class="list-item" for="exercise{{ $exercise->id }}">
                        <span>
                            <div class="">
                                <h2 class="title">{{ $exercise->title }}</h2>
                                <p class="item-lead">{{ $exercise->content }}</p>
                                <a href="{{ URL::route('exercise.view', $exercise->id) }}" class="btn btn-primary">{{ trans('common.see-more') }} <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </span>

                    </label>
                    <div class="clearfix"></div>
                @endforeach
                {{ Form::submit(Lang::get('common.generate-pdf')) }}
                {{ Form::close() }}
            @else
                <p class="no-results">{{ trans('app.no-exercises-results') }}</p>
            @endif
        </div>
    </div>
    @yield('aside')
@stop
