@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">{{ trans('app.attachment-new') }}</h1>
    </div>
  </div>
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
