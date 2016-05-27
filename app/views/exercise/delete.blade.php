@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.exercise-delete') }}</h1>
    </div>
  </div>
  @if(!empty($exercise))
  <div class="delete">
    <p class="lead">{{ trans('app.exercise-delete-message') }}</p>
    <a href="#" class="btn btn-back">{{ trans('common.back') }}</a>
    <form action="{{ URL::route('exercise.destroy', $exercise->id) }}" method="post">
      <input type="submit" class="btn btn-delete" value="{{ trans('common.delete') }}">
    </form>
  </div>
  @else
    <p class="no-result">{{ trans('app.no-such-exercise') }}</p>
  @endif
@stop
