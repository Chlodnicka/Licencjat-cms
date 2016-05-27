@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.tag-edit') }}</h1>
    </div>
  </div>
  @if(!empty($tag))
    <form action="{{ URL::route('tag.update', $tag->id) }}" method="post">
      <label for="name">{{ trans('app.tag') }}</label>
      <input type="text" id="name" name="name" value="{{ $tag->name }}">
      @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
      <input type="submit" class="btn btn-submit" value="{{ trans('common.submit') }}">
    </form>
  @else
    <p class="no-result">{{ trans('app.no-such-tag') }}</p>
  @endif
@stop
