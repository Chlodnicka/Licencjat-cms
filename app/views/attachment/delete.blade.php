@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">{{ trans('app.attachment-delete') }}</h1>
    </div>
  </div>
  <div class="delete">
    <p class="lead">Czy na pewno chcesz usunąć załącznik?</p>
    <a href="#" class="btn btn-back">Wróć</a>
    {{ Form::open(array('route' => array('attachment.destroy', $attachment->id))) }}
    {{ Form::submit('Usuń', array('class' => 'btn btn-delete')) }}
    {{ Form::close() }}
  </div>
@stop
