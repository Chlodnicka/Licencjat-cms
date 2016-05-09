@section('content')
<div class="content news single-page">
  @if(!empty($news))
    <div class="action-buttons">
      <a href="{{ URL::route('news.new') }}">Nowy</a>
      <a href="{{ URL::route('news.edit', $news->id) }}">Edytuj</a>
      <a href="{{ URL::route('news.delete', $news->id) }}">Usuń</a>
    </div>
    @if(!empty($news->title))
      <h1 class="title">{{ $news->title }}</h1>
    @endif
    @if(!empty($news->lead))
      <p class="lead">{{ $news->lead }}</p>
    @endif
    @if(!empty($news->date))
      <p class="date">{{ $news->date }}</p>
    @endif
    @if(!empty($news->content))
      <div class="richtext">
        {{ $news->content }}
      </div>
    @endif
    <p class="author">{{ $news->author->firstname }} {{ $news->author->lastname }}</p>
    <a href="{{ URL::route('news.index') }}" class="btn btn-back"><i class="fa fa-long-arrow-left"></i>Wroć</a>
  @else
    <p class="no-result">Dana aktualność nie istnieje</p>
  @endif
</div>
@stop
