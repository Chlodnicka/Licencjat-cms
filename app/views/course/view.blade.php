@section('content')
  <div class="content course">
    @if (!empty($course->name))
      <h1 class="title">{{ $course->name }}</h1>
    @endif
    @if (!empty($course->lead))
      <p class="lead">{{$course->lead}}</p>
    @endif
        @if($actions == 1)
          <div  class="action-buttons">
            <a href="{{ URL::route('course.edit', $course->id) }}">{{ trans('common.edit') }}</a>
            <a href="{{ URL::route('course.delete', $course->id) }}">{{ trans('common.delete') }}</a>
            <a href="{{ URL::route('course.new') }}">{{ trans('common.new') }}</a>
            <a href="{{ URL::route('exercise.generate', $course->id) }}">{{ trans('common.generate') }}</a>
          </div>
        @endif
      @if (!empty($course->description))
        <div class="richtext">
          <div>{{ $course->description }}</div>
        </div>
      @endif
      @if(!empty($lectures))
        <div class="lectures">
          <h2>{{ trans('app.lectures') }}</h2>
          <ul>
            @foreach($lectures as $lecture)
              <a href="{{ URL::route('lecture.view', $lecture->id) }}"><li>{{ $lecture->title }}</li></a>
            @endforeach
          </ul>
          <a href="{{ URL::route('lecture.indexCourse', $course->id) }}" class="btn btn-more">{{ trans('common.see-more') }} <i class="fa fa-long-arrow-right"></i></a>
        </div>
      @endif
      @if (!empty($exercises))
        <div class="exercises">
          <h2>{{ trans('app.exercises') }}</h2><!--dopisać index w zaleźności od wykładu, przypiwania itd!-- BW!-->
          <ul>
              @foreach($lectures as $lecture)
                  <a href="{{ URL::route('exercise.indexLecture', $lecture->id) }}"><li>{{ $lecture->title }}</li></a>
              @endforeach
              <a href="{{ URL::route('exercise.indexDifficulty', array(1, $course->id)) }}"><li>Łatwe</li></a>
              <a href="{{ URL::route('exercise.indexDifficulty', array(2, $course->id)) }}"><li>Srednie</li></a>
              <a href="{{ URL::route('exercise.indexDifficulty', array(3, $course->id)) }}"><li>Trudne</li></a>

          </ul>
          <a href="{{ URL::route('exercise.indexCourse', $course->id) }}" class="btn btn-more">{{ trans('common.see-more') }} <i class="fa fa-long-arrow-right"></i></a>
        </div>
      @endif
    <a href="{{ URL::route('course.index') }}" class="btn btn-back"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
  </div>
@stop
