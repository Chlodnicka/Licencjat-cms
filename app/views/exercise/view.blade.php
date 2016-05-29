@section('content')
  @if(!empty($exercise->title))
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header title">{{ $exercise->title }}</h1>
      </div>
    </div>
  @endif
  @if(!empty($exercise->course->name))
    <h2>{{ $exercise->course->name }}</h2>
  @endif
  @if($actions == 1)
  <div class="action-buttons">
    <a class="btn btn-primary" href="{{ URL::route('exercise.new') }}">{{ trans('common.new') }}</a>
    <a class="btn btn-primary" href="{{ URL::route('exercise.edit', $exercise->id) }}">{{ trans('common.edit') }}</a>
    <a class="btn btn-danger" href="{{ URL::route('exercise.delete', $exercise->id) }}">{{ trans('common.delete') }}</a>
  </div>
  @endif
  <div class="content exercise">
    <div class="properties">

      <p>@if(!empty($exercise->difficulty)){{ $exercise->difficulty }}@endif @if(!empty($exercise->lecture->title))| {{ $exercise->lecture->title }}@endif</p>
      <div class="tags">
        @foreach($exercise->tags as $item)
          <p class="tag-item"><a href="/">{{ $item->name }}</a></p>
        @endforeach
      </div>
    </div>
    @if(!empty($exercise->content))
      <div class="exercise-content">
        <h3>{{ trans('app.exercise-content') }}</h3>
        <p>{{ $exercise->content }}</p>
      </div>
    @endif
    @if(!empty($exercise->solution))
      <div class="exercise-solution dropdown">
        <h3>{{ trans('app.exercise-solution') }} <i class="fa fa-chevron-down"></i></h3>
        <p>{{ $exercise->solution }}</p>
      </div>
    @else
      <p class="no-solution">{{ trans('app.no-solution') }}</p>
    @endif
    <a href="{{ URL::route('exercise.indexCourse', $exercise->course->id) }}" class="btn btn-primary"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
  </div>
@stop
