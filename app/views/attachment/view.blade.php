@section('content')
  <h1>{{ $attachment->title }}</h1>
  <p>{{ $attachment->description }}</p>
  {{ HTML::image($attachment->url) }}
  <p>{{ $attachment->name }}</p>
@stop
