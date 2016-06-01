@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">{{ trans('app.attachment-edit') }}</h1>
    </div>
  </div>
  <div class="action-buttons">
    <a href="{{ URL::route('attachment.view', $attachment->id) }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
  </div>
  {{ Form::open(array('route' => array('attachment.update', $attachment->id))) }}
  {{ Form::label('description', Lang::get('common.alternative-text'))}}
  {{ Form::text('description', $attachment->description) }}
  {{ Form::label('title', Lang::get('common.title'))}}
  {{ Form::text('title', $attachment->title) }}
  {{ Form::submit(Lang::get('common.submit')) }}
  {{ Form::close() }}
@stop
