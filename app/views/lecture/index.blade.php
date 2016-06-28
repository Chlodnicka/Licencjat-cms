@section('content')

<div class="list">
    <div class="breadcrumbs">
        @if($bread == 1)
            <span><a href="{{ URL::route('course.index') }}">Kursy</a></span>
            <span><i class="fa fa-angle-right"></i> </span>
            <span><a href="{{ URL::route('course.view', $course->id) }}">Kurs {{ $course->name }}</a></span>
            <span><i class="fa fa-angle-right"></i> </span>
            <span><a href="{{ URL::route('lecture.indexCourse', $course->id) }}">Wykłady kursu {{ $course->name }}</a></span>
        @elseif($bread == 0)
            <span><a href="{{ URL::route('course.index') }}">Kursy</a></span>
            <span><i class="fa fa-angle-right"></i> </span>
            <span><a href="{{ URL::route('lecture.index') }}">Lista wszystkich wykładów</a></span>
        @endif
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header title">{{ trans('app.list-of-lectures') }}</h1>
        </div>
    </div>
  @if(!empty($lectures_lead->lead))
    <p class="lead">{{ $lecture_lead->lead }}</p>
  @endif
    @if($actions == 1)
      <div class="action-buttons">
          <a href="{{ URL::route('dashboard') }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
          <a class="btn btn-primary" href="{{ URL::route('lecture.new') }}">{{ trans('common.new') }}</a>
      </div>
    @endif
  @if(!empty($lectures))
    <div class="content lecture">
      @foreach($lectures as $lecture)
      <div class="list-item">
        <h2 class="title">{{ $lecture->title }}</h2>
        <p class="item-lead">{{ $lecture->lead }}</p>
        <a href="{{ URL::route('lecture.view', $lecture->id) }}" class="btn btn-primary">{{ trans('common.see-more') }} <i class="fa fa-long-arrow-right"></i></a>
      </div>
      <div class="clearfix"></div>
      @endforeach
          <?php echo $lectures->links(); ?>
    </div>
  @endif
</div>
@stop
