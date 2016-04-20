@section('content')
<div class="content news single-page">
  <h1 class="title">{{ $news->title }}</h1>
  <p class="lead">{{ $news->lead }}</p>
  <p class="date">{{ $news->date }}</p>
  <div class="richtext">
    {{ $news->content }}
  </div>
  <p class="author">{{ $news->author->firstname }} {{ $news->author->lastname }}</p>
  <a href="{{ URL::route('news.index') }}" class="btn btn-back"><i class="fa fa-long-arrow-left"></i>Wroć</a>
</div>
@stop
