@section('content')
<div class="list">
  <h1>Lecture! Index</h1>
  <p class="lead">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
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
</div>
@stop
