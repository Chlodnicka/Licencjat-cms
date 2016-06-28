@section('content')
  <div class="content exercise single-page">
      <div class="breadcrumbs">
          <span><a href="{{ URL::route('course.index') }}">Kursy</a></span>
          <span><i class="fa fa-angle-right"></i> </span>
          <span><a href="{{ URL::route('course.view', $exercise->course->id) }}">Kurs {{ $exercise->course->name }}</a></span>
          <span><i class="fa fa-angle-right"></i> </span>
          <span><a href="{{ URL::route('exercise.indexCourse', $exercise->course->id) }}">Wykłady kursu {{ $exercise->course->name }}</a></span>
          <span><i class="fa fa-angle-right"></i> </span>
          <span><a href="{{ URL::route('exercise.view', $exercise->id) }}">Kurs {{ $exercise->title }}</a></span>
      </div>
    @if(!empty($exercise->title))
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header title">{{ $exercise->title }}</h1>
        </div>
      </div>
    @endif
    @if($actions == 1)
      <div class="action-buttons">
        <a href="{{ URL::route('exercise.index') }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
        <a class="btn btn-primary" href="{{ URL::route('exercise.new') }}">{{ trans('common.new') }}</a>
        <a class="btn btn-primary" href="{{ URL::route('exercise.edit', $exercise->id) }}">{{ trans('common.edit') }}</a>
        <a class="btn btn-danger" href="{{ URL::route('exercise.delete', $exercise->id) }}">{{ trans('common.delete') }}</a>
      </div>
    @endif
    @if(!empty($exercise->course->name))
      <h2>{{ $exercise->course->name }}</h2>
    @endif
    <div class="properties">

      <p>@if(!empty($exercise->lecture->title)) {{ $exercise->lecture->title }} @endif</p>
      <div class="tags">
        @foreach($exercise->tags as $item)
          <p class="tag-item"><a href="{{ URL::route('tag.view', $item->id) }}">{{ $item->name }}</a></p>
        @endforeach
      </div>
    </div>
    @if(!empty($exercise->content))
      <div class="exercise-content">
        <h3>{{ trans('app.exercise-content') }}</h3>
        <p>{{ $exercise->content }}</p>
      </div>
    @endif
    @if($actions == 1)
            @if(!empty($exercise->solution))
                <div class="exercise-solution dropdown">
                    <h3>{{ trans('app.exercise-solution') }} <i class="fa fa-chevron-down"></i></h3>
                    <div class="drop">{{ $exercise->solution }}</div>
                </div>
            @else
                <p class="no-solution">{{ trans('app.no-solution') }}</p>
            @endif
        @else
            @if($exercise->solution_access == 1)
                @if(!empty($exercise->solution))
                  <div class="exercise-solution dropdown">
                    <h3>{{ trans('app.exercise-solution') }} <i class="fa fa-chevron-down"></i></h3>
                    <div class="drop">{{ $exercise->solution }}</div>
                  </div>
                @else
                  <p class="no-solution"><b >{{ trans('app.no-solution') }}</b></p>
                @endif
            @endif
    @endif
    @if($actions != 1)
      <a href="{{ URL::route('exercise.indexCourse', $exercise->course->id) }}" class="btn btn-primary"><i class="fa fa-long-arrow-left back"></i>{{ trans('common.back') }}</a>
    @endif
  </div>
@stop
