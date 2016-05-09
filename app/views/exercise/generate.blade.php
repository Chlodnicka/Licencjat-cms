@section('content')
    <h1>Exercise! Generate</h1>
    <div class="exercises">
        <h2>Filtruj</h2>
        {{ Form::open(array('route' => array('exercise.generate', $course_id))) }}
        <div class="form-cluster">
            <div class="form-group">
                {{ Form::label('content', 'Treść')}}
                {{ Form::text('content') }}
            </div>
            <div class="form-group">
                {{ Form::label('number', 'Ilość zadań')}}
                {{ Form::number('number', true) }}
            </div>
            {{ Form::label('difficulty','Trudność:') }}
            {{ Form::select('difficulty', $difficulty) }}
            {{ Form::label('exercise_lecture','Wybierz wykłady:') }}
            <select name="exercise_lecture" id="exercise_lecture" multiple>
                @foreach($exercise_lectures as $lecture)
                    <option value="{{ $lecture }}">{{ $lecture }}</option>
                @endforeach
            </select>
            {{ Form::label('exercise_tags','Select Category:') }}
            <select name="exercise_tags" id="exercise_tags" multiple>
                @foreach($exercise_tags as $tag)
                    <option value="{{ $tag }}">{{ $tag }}</option>
                @endforeach
            </select>
                    <!--tagi-->
            {{ Form::submit('Submit') }}
        </div>
        {{ Form::close() }}

        {{ Form::open(array('route' => array('exercise.generateByInput'))) }}
        <label for="answers">Wygenerować PDFa z odpowiedziami?</label>
        <input name="answers" id="answers" type="checkbox" checked="checked">
        @foreach( $exercises as $exercise)
            <input name="exercises[]" id="exercise{{ $exercise->exercise_id }}" type="checkbox" value="{{ $exercise->exercise_id }}" checked="checked" />
            <label for="exercise{{ $exercise->exercise_id }}">
                <div class="list-item">
                    <h2 class="title">{{ $exercise->title }}</h2>
                    <p class="item-lead">{{ $exercise->content }}</p>
                    <a href="{{ URL::route('exercise.view', $exercise->exercise_id) }}" class="btn btn-more">Zobacz więcej <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </label>
            <div class="clearfix"></div>
        @endforeach
        {{ Form::submit('Generuj PDF') }}
        {{ Form::close() }}
    </div>
    @yield('aside')
@stop
