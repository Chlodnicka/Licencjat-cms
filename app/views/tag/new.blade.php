@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.tag-new') }}</h1>
    </div>
  </div>
  <form action="{{ URL::route('tag.create') }}" method="post">
    <label for="name">{{ trans('app.tag') }}</label>
    <input type="text" id="name" name="name" value="{{ Input::old('name') }}">
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
    <input type="submit" class="btn btn-submit" value="{{ trans('common.submit') }}">
  </form>
@stop
