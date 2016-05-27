@section('content')
  @if(!empty($lecture))
    @if(!empty($lecture->title))
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header title">{{ $lecture->title }}</h1>
        </div>
      </div>
    @endif
    <div class="lecture single-page">
      @if(!empty($lecture->lead))
        <p class="lead">{{ $lecture->lead }}</p>
      @endif
        @if($actions == 1)
        <div class="action-buttons">
          <a href="{{ URL::route('lecture.new') }}">{{ trans('common.new') }}</a>
          <a href="{{ URL::route('lecture.edit', $lecture->id) }}">{{ trans('common.edit') }}</a>
          <a href="{{ URL::route('lecture.delete', $lecture->id) }}">{{ trans('common.delete') }}</a>
        </div>
        @endif
      @if(!empty($lecture->content))
        <div class="richtext">
          {{ $lecture->content }}
        </div>
      @endif
        <a href="{{ URL::route('lecture.indexCourse', $lecture->course->id) }}" class="btn btn-back"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
        <a href="{{URL::route('exercise.index')}}" class="btn btn-more">{{ trans('app.go-to-exercises') }}<i class="fa fa-long-arrow-right"></i></a>
    </div>
  @else
    <p class="no-result">{{ trans('no-such-lecture') }}</p>
  @endif
@stop
