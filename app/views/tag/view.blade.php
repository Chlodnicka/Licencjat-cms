@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ $tag->name }}</h1>
    </div>
  </div>
  @if($actions == 1)
    <div class="action-buttons">
      <a href="{{ URL::route('tag.index') }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
      <a  class="btn btn-primary" href="{{ URL::route('tag.new') }}">{{ trans('common.new') }}</a>
      <a  class="btn btn-primary" href="{{ URL::route('tag.edit', $tag->id) }}">{{ trans('common.edit') }}</a>
      <a  class="btn btn-danger" href="{{ URL::route('tag.delete', $tag->id) }}">{{ trans('common.delete') }}</a>
    </div>
  @endif
  @if(!empty($tag))
    @if(!empty($courses))
      <p class="category-tag">{{ trans('app.courses') }}</p>
      <ul>
        @foreach($courses as $course)
          <li><a href="{{ URL::route('course.view', $course->id) }}">{{ $course->name }}</a></li>
        @endforeach
      </ul>
    @endif
    @if(!empty($lectures))
      <p class="category-tag">{{ trans('app.lectures') }}</p>
      <ul>
      @foreach($lectures as $lecture)
        <li><a href="{{ URL::route('lecture.view', $lecture->id) }}">{{ $lecture->title }}</a></li>
      @endforeach
    </ul>
    @endif
    @if(!empty($exercises))
      <p class="category-tag">{{ trans('app.exercises') }}</p>
      <ul>
        @foreach($exercises as $exercise)
          <li><a href="{{ URL::route('exercise.view', $exercise->id) }}">{{ $exercise->title }}</a></li>
        @endforeach
      </ul>
    @endif
    @if(!empty($news))
      <p class="category-tag">{{ trans('app.news') }}</p>
      <ul>
        @foreach($news as $newsItem)
          <li><a href="{{ URL::route('news.view', $newsItem->id) }}">{{ $newsItem->title }}</a></li>
        @endforeach
      </ul>
    @endif
  @endif
@stop
