@section('content')
  @if(!empty($lecture))

    <div class="lecture single-page">
      @if(!empty($lecture->title))
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header title">{{ $lecture->title }}</h1>
          </div>
        </div>
      @endif
      @if($actions == 1)
        <div class="action-buttons">
          <a href="{{ URL::route('lecture.indexCourse', $lecture->course->id) }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
          <a class="btn btn-primary" href="{{ URL::route('lecture.new') }}">{{ trans('common.new') }}</a>
          <a class="btn btn-primary" href="{{ URL::route('lecture.edit', $lecture->id) }}">{{ trans('common.edit') }}</a>
          <a class="btn btn-danger" href="{{ URL::route('lecture.delete', $lecture->id) }}">{{ trans('common.delete') }}</a>
        </div>
      @endif
      @if(!empty($lecture->lead))
        <p class="lead">{{ $lecture->lead }}</p>
      @endif
          <div class="tags">
              @foreach($lecture->tags as $item)
                  <p class="tag-item"><a href="{{ URL::route('tag.view', $item->id) }}">{{ $item->name }}</a></p>
              @endforeach
          </div>
      @if(!empty($lecture->content))
          <div class="attachment">
              @foreach($attachment as $item)
                  @if(!empty($item->title))
                    {{ link_to($item->url, $item->title) }}
                  @else
                      {{ link_to($item->url, $item->name) }}
                  @endif
              @endforeach
          </div>
        <div class="richtext">
          {{ $lecture->content }}
        </div>
      @endif
        @if($actions != 1)
          <a href="{{ URL::route('lecture.indexCourse', $lecture->course->id) }}" class="btn btn-primary "><i class="fa fa-long-arrow-left back"></i>{{ trans('common.back') }}</a>
        @endif
          <a href="{{URL::route('exercise.index')}}" class="btn btn-primary">{{ trans('app.go-to-exercises') }}<i class="fa fa-long-arrow-right"></i></a>
    </div>
  @else
    <p class="no-result">{{ trans('no-such-lecture') }}</p>
  @endif
@stop
