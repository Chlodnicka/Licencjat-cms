@section('content')
  <h1>Attachment! Edit</h1>
  {{ Form::open(array('route' => array('attachment.update', $attachment->id))) }}
  {{ Form::label('description', 'Tekst alternatywny / opis')}}
  {{ Form::text('description', $attachment->description) }}
  {{ Form::label('title', 'Tytuł')}}
  {{ Form::text('title', $attachment->title) }}
  {{ Form::submit('Submit') }}
  {{ Form::close() }}
@stop
