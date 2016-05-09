@section('content')
<div class="list">
  <h1>Lecture! Index</h1>
  @if(!empty($lectures_lead->lead))
    <p class="lead">{{ $lecture_lead->lead }}</p>
  @endif
  <div class="action-buttons">
    <a href="{{ URL::route('lecture.new') }}">Nowy</a>
  </div>
  @if(!empty($lectures))
    <div class="content lecture">
      @foreach($lectures as $lecture)
      <div class="list-item">
        <h2 class="title">{{ $lecture->title }}</h2>
        <p class="item-lead">{{ $lecture->lead }}</p>
        <a href="{{ URL::route('lecture.view', $lecture->id) }}" class="btn btn-more">Zobacz więcej <i class="fa fa-long-arrow-right"></i></a>
      </div>
      <div class="clearfix"></div>
      @endforeach
    </div>
  @endif
</div>
@stop
