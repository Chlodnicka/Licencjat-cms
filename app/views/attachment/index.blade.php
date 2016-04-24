@section('content')
  <h1>Attachment! Index</h1>
  @foreach($attachments as $attachment)
    <p>{{ $attachment->name }}</p>
    {{ HTML::image($attachment->url) }}
  @endforeach
@stop
