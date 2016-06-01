@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">{{ trans('app.attachment-delete') }}</h1>
    </div>
  </div>
  <div class="delete">
    <p class="lead">Czy na pewno chcesz usunąć załącznik?</p>
    <div class="action-buttons">
      <a href="{{ URL::route('attachment.view', $attachment->id) }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
    </div>
    {{ Form::open(array('route' => array('attachment.destroy', $attachment->id))) }}
    {{ Form::submit('Usuń', array('class' => 'btn btn-danger')) }}
    {{ Form::close() }}
  </div>
@stop
