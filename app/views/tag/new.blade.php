@section('content')
  <h1>{{ trans('app.tag-new') }}</h1>
  <form action="{{ URL::route('tag.create') }}" method="post">
    <label for="name">{{ trans('app.tag') }}</label>
    <input type="text" id="name" name="name" value="{{ Input::old('name') }}">
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
    <input type="submit" class="btn btn-submit" value="{{ trans('common.submit') }}">
  </form>
@stop
