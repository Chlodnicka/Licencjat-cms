@section('content')
  <h1>Attachment! Edit</h1>
  {{ Form::open(array('action' => 'AttachmentController@update', 'files'=>true)) }}
  {{ Form::label('image', 'Upload Image')}}
  {{ Form::file('image') }}
  {{ Form::submit('Submit') }}
  {{ Form::close() }}
@stop
