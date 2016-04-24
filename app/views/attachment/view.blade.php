@section('content')
  <h1>{{ $attachment->name }}</h1>
  {{ HTML::image($attachment->url) }}
@stop
