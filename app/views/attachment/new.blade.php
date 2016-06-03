@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">{{ trans('app.attachment-new') }}</h1>
    </div>
  </div>
  <div class="action-buttons">
    <a href="{{ URL::route('attachment.index') }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
  </div>
  {{ Form::open(array('action' => 'AttachmentController@create', 'files'=>true)) }}
  {{ Form::label('image', Lang::get('common.upload-file'))}}
  {{ Form::file('image') }}
  <div class="form-group">
    {{ Form::label('description', Lang::get('common.alternative-text'))}}
    {{ Form::text('description') }}
  </div>
  <div class="form-group">
    {{ Form::label('title', Lang::get('common.title'))}}
    {{ Form::text('title') }}
  </div>

  {{ Form::submit(Lang::get('common.submit')) }}
  {{ Form::close() }}
@stop
