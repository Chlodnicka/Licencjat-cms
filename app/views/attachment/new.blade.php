@section('content')
  <h1>Attachment! New</h1>
  {{ Form::open(array('action' => 'AttachmentController@create', 'files'=>true)) }}
  {{ Form::label('image', 'Upload Image')}}
  {{ Form::file('image') }}
  {{ Form::label('description', 'Tekst alternatywny / opis')}}
  {{ Form::text('description') }}
  {{ Form::label('title', 'Tytuł')}}
  {{ Form::text('title') }}
  {{ Form::submit('Submit') }}
  {{ Form::close() }}
@stop
