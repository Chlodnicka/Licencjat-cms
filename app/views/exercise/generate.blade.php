@section('content')
    <h1>{{ trans('app.exercise-generate') }}</h1>
    <div class="exercises">
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
                {{ Form::label('difficulty',Lang::get('common.difficulty')) }}
                {{ Form::select('difficulty', $difficulty) }}
                @if(!empty($exercise_lectures))
                    {{ Form::label('exercise_lectures',Lang::get('common.select-lectures')) }}
                    {{ Form::select('exercise_lectures[]', ($exercise_lectures), null, ['multiple'=>true,'class' => 'form-control margin']) }}

                @endif
                @if(!empty($exercise_tags))
                    {{ Form::label('exercise_tags',Lang::get('common.tags-category')) }}
                    {{ Form::select('exercise_tags[]', ($exercise_tags), null, ['multiple'=>true,'class' => 'form-control margin']) }}
                @endif
                <!--tagi-->
                {{ Form::submit(Lang::get('common.submit')) }}
            </div>
            {{ Form::close() }}
        </div>
        <div class="exercises-to-Pdf">
            @if(!empty($exercises))
                {{ Form::open(array('route' => array('exercise.generateByInput'))) }}
                <label for="answers">{{ trans('app.generate-with-answers') }}</label>
                <input name="answers" id="answers" type="checkbox" checked="checked">
                @foreach( $exercises as $exercise)
                    <input name="exercises[]" id="exercise{{ $exercise->id }}" type="checkbox" value="{{ $exercise->id }}" checked="checked" />
                    <label for="exercise{{ $exercise->id }}">
                        <div class="list-item">
                            <h2 class="title">{{ $exercise->title }}</h2>
                            <p class="item-lead">{{ $exercise->content }}</p>
                            <a href="{{ URL::route('exercise.view', $exercise->id) }}" class="btn btn-more">{{ trans('common.see-more') }} <i class="fa fa-long-arrow-right"></i></a>
                        </div>
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
