@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">{{ trans('app.attachment-edit') }}</h1>
    </div>
  </div>
  {{ Form::open(array('route' => array('attachment.update', $attachment->id))) }}
  {{ Form::label('description', 'Tekst alternatywny / opis')}}
  {{ Form::text('description', $attachment->description) }}
  {{ Form::label('title', 'Tytuł')}}
  {{ Form::text('title', $attachment->title) }}
  {{ Form::submit('Submit') }}
  {{ Form::close() }}
@stop
