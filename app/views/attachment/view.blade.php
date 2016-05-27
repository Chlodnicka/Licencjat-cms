@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">{{ $attachment->title }}</h1>
    </div>
  </div>
  <p>{{ $attachment->description }}</p>
  {{ HTML::image($attachment->url) }}
  <p>{{ $attachment->name }}</p>
@stop
