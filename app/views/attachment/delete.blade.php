@section('content')
  <h1>Attachment! Delete</h1>
  <div class="delete">
    <p class="lead">Czy na pewno chcesz usunąć załącznik?</p>
    <a href="#" class="btn btn-back">Wróć</a>
    {{ Form::open(array('route' => array('attachment.destroy', $attachment->id))) }}
    {{ Form::submit('Usuń', array('class' => 'btn btn-delete')) }}
    {{ Form::close() }}
  </div>
@stop
