@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">{{ trans('app.attachment-index') }}</h1>
    </div>
  </div>
    <div class="action-buttons">
      <a href="{{ URL::route('dashboard') }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
      <a class="btn btn-primary" href="{{ URL::route('attachment.new') }}">{{ trans('common.new') }}</a>
    </div>
  @foreach($attachments as $attachment)
    <a href="{{ URL::route('attachment.view', $attachment->id) }}"><p>{{ $attachment->title }}</p>
    {{ HTML::image($attachment->url) }}</a>
  @endforeach
@stop
