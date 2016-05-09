@section('content')
  <div class="action-buttons">
    <a href="{{ URL::route('tag.new') }}">Nowy</a>
    <a href="{{ URL::route('tag.edit', $tag->id) }}">Edytuj</a>
    <a href="{{ URL::route('tag.delete', $tag->id) }}">Usuń</a>
  </div>
  @if(!empty($tag))
    <h1>{{ $tag->name }}</h1>
    @if(!empty($courses))
      <p class="category-tag">Kursy</p>
      <ul>
        @foreach($courses as $course)
          <li><a href="{{ URL::route('course.view', $course->id) }}">{{ $course->name }}</a></li>
        @endforeach
      </ul>
    @endif
    @if(!empty($lectures))
      <p class="category-tag">Wykłady</p>
      <ul>
      @foreach($lectures as $lecture)
        <li><a href="{{ URL::route('lecture.view', $lecture->id) }}">{{ $lecture->title }}</a></li>
      @endforeach
    </ul>
    @endif
    @if(!empty($exercises))
      <p class="category-tag">Zadania</p>
      <ul>
        @foreach($exercises as $exercise)
          <li><a href="{{ URL::route('exercise.view', $exercise->id) }}">{{ $exercise->title }}</a></li>
        @endforeach
      </ul>
    @endif
    @if(!empty($news))
      <p class="category-tag">Aktualności</p>
      <ul>
        @foreach($news as $newsItem)
          <li><a href="{{ URL::route('news.view', $newsItem->id) }}">{{ $newsItem->title }}</a></li>
        @endforeach
      </ul>
    @endif
  @endif
@stop
