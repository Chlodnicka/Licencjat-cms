@section('content')
  <h1>Attachment! Index</h1>
  @foreach($attachments as $attachment)
    <a href="{{ URL::route('attachment.view', $attachment->id) }}"<p>{{ $attachment->name }}</p>
    {{ HTML::image($attachment->url) }}
  @endforeach
@stop
