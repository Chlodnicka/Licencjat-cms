@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">{{ trans('app.attachment') }}{{ $attachment->title }}</h1>
    </div>
  </div>
  <div class="action-buttons">
    <a href="{{ URL::route('attachment.index') }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
    <a class="btn btn-primary" href="{{ URL::route('attachment.new') }}">{{ trans('common.new') }}</a>
    <a class="btn btn-primary" href="{{ URL::route('attachment.edit', $attachment->id) }}">{{ trans('common.edit') }}</a>
    <a class="btn btn-danger" href="{{ URL::route('attachment.delete', $attachment->id) }}">{{ trans('common.delete') }}</a>
  </div>
  <p>{{ $attachment->description }}</p>
  {{ HTML::image($attachment->url, $attachment->description) }}
  <p>{{ $attachment->name }}</p>
@stop
