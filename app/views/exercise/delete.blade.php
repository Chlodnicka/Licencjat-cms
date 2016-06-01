@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.exercise-delete') }}</h1>
    </div>
  </div>
  @if(!empty($exercise))
  <div class="delete">
    <p class="lead">{{ trans('app.exercise-delete-message') }}</p>
    <div class="action-buttons">
      <a href="{{ URL::route('exercise.view', $exercise->id) }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
    </div>
    <form action="{{ URL::route('exercise.destroy', $exercise->id) }}" method="post">
      <input type="submit" class="btn btn-danger" value="{{ trans('common.delete') }}">
    </form>
  </div>
  @else
    <p class="no-result">{{ trans('app.no-such-exercise') }}</p>
  @endif
@stop
