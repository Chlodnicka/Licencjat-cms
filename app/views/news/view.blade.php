@section('content')
<div class="content news single-page">
  <a href="{{ URL::route('news.new') }}">Nowy</a>
  <a href="{{ URL::route('news.edit', $news->id) }}">Edytuj</a>
  <a href="{{ URL::route('news.delete', $news->id) }}">Usuń</a>
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
