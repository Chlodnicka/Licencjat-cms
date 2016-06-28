@section('content')
  <div class="content course single-page">
      <div class="breadcrumbs">
          <span><a href="{{ URL::route('course.index') }}">Kursy</a></span>
          <span><i class="fa fa-angle-right"></i> </span>
          <span><a href="{{ URL::route('course.view', $course->id) }}">Kurs {{ $course->name }}</a></span>
      </div>
    @if (!empty($course->name))
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header title">{{ $course->name }}</h1>
              </div>
          </div>
    @endif
        @if($actions == 1)
            <div  class="action-buttons">
                <a href="{{ URL::route('course.index') }}" class="btn btn-default btn-back"><i class="fa fa-long-arrow-left"></i>  {{ trans('common.back') }} </a>
                <a class="btn btn-primary" href="{{ URL::route('course.edit', $course->id) }}">{{ trans('common.edit') }}</a>
                <a class="btn btn-primary" href="{{ URL::route('course.new') }}">{{ trans('common.new') }}</a>
                @if (count($exercises) != 0)
                    <a class="btn btn-primary" href="{{ URL::route('exercise.generate', $course->id) }}">{{ trans('common.generate') }}</a>

                @endif

                    <a class="btn btn-primary" href="{{ URL::route('exercise.new') }}"> Nowe zadanie </a>
                    <a class="btn btn-primary" href="{{ URL::route('lecture.new') }}">Nowy wykład</a>

                <a class="btn btn-danger" href="{{ URL::route('course.delete', $course->id) }}">{{ trans('common.delete') }}</a>
            </div>
        @endif
    @if (!empty($course->lead))
      <p class="lead">{{$course->lead}}</p>
    @endif
        <div class="tags">
            @foreach($course->tags as $item)
                <p class="tag-item"><a href="{{ URL::route('tag.view', $item->id) }}">{{ $item->name }}</a></p>
            @endforeach
        </div>
      @if (!empty($course->description))
        <div class="richtext">
          <div>{{ $course->description }}</div>
        </div>
      @endif
      @if(count($lectures) != 0)
        <div class="lectures">
          <h2>{{ trans('app.lectures') }}</h2>
          <ul>
            @foreach($lectures as $lecture)
              <a href="{{ URL::route('lecture.view', $lecture->id) }}"><li>{{ $lecture->title }}</li></a>
            @endforeach
          </ul>
          <a href="{{ URL::route('lecture.indexCourse', $course->id) }}" class="btn btn-default">{{ trans('common.see-more') }} <i class="fa fa-long-arrow-right"></i></a>
        </div>
      @endif
      @if (count($exercises) != 0)
        <div class="exercises">
          <h2>{{ trans('app.exercises') }}</h2><!--dopisać index w zaleźności od wykładu, przypiwania itd!-- BW!-->
          <ul>

              @if(count($exercises_lectures) != 0)
                      @foreach($exercises_lectures as $lectures_item)
                        <a href="{{ URL::route('exercise.indexLecture', $lectures_item->id) }}"><li>{{ $lectures_item->title }}</li></a>
                    @endforeach
                  @endif
                  @if(count($exercises_tags) != 0)
                      @foreach($exercises_tags as $tags_item)
                          <a href="{{ URL::route('exercise.indexTags', $tags_item->id) }}"><li>{{ $tags_item->name }}</li></a>
                      @endforeach
                  @endif
              @if(count($exercises_lectures) == 0 && count($exercises_tags) == 0)
                  <?php $i = 1;?>
                  @foreach($exercises as $exercise)
                      <a href="{{ URL::route('exercise.view', $exercise->id) }}"><li>Zadanie {{ $i }}</li></a>
                      <?php $i++;?>
                  @endforeach
              @endif
          </ul>
          <a href="{{ URL::route('exercise.indexCourse', $course->id) }}" class="btn btn-default">{{ trans('common.see-more') }} <i class="fa fa-long-arrow-right"></i></a>
        </div>
      @endif
        @if($actions != 1)
            <a href="{{ URL::route('course.index') }}" class="btn btn-primary back-btn"><i class="fa fa-long-arrow-left back"></i>{{ trans('common.back') }}</a>
        @endif
  </div>
@stop
