@section('content')
  <a href="{{ URL::route('tag.new') }}">Nowy</a>
  <a href="{{ URL::route('tag.edit', $tag->id) }}">Edytuj</a>
  <a href="{{ URL::route('tag.delete', $tag->id) }}">Usuń</a>
  <h1>{{ $tag->name }}</h1>
  <ul>
    @foreach($courses as $course)
      <li>{{ $course->name }}</li>
    @endforeach
  </ul>
  <ul>
    @foreach($lectures as $lecture)
      <li>{{ $lecture->title }}</li>
    @endforeach
  </ul>
  <ul>
    @foreach($exercises as $exercise)
      <li>{{ $exercise->title }}</li>
    @endforeach
  </ul>
  <ul>
    @foreach($news as $newsItem)
      <li>{{ $newsItem->title }}</li>
    @endforeach
  </ul>
@stop
