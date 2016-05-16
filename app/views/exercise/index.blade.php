@section('content')
  <h1>{{ trans('app.exercises-list') }}</h1>
  @if(!empty($exercise_lead->lead))
    <p class="lead">{{ $exercise_lead->lead }}</p>
  @endif
  <div class="action-buttons">
    <a href="{{ URL::route('exercise.new') }}">{{ trans('common.new') }}</a>
  </div>
  <div class="exercises index">
    <div class="filter-box">
      <h2>{{ trans('app.filter') }}</h2>
      {{ Form::open(array('route' => array('exercise.search'))) }}
      <div class="form-cluster">
        <div class="form-group">
          {{ Form::label('content', Lang::get('common.content'))}}
          {{ Form::text('content') }}
        </div>
        <div class="form-group">
          {{ Form::label('solutionAccess', Lang::get('common.solution-access'))}}
          {{ Form::checkbox('solution_access', true) }}
        </div>
        {{ Form::label('difficulty', Lang::get('common.difficulty')) }}
        {{ Form::select('difficulty', $difficulty) }}
                <!--tagi-->
        {{ Form::submit(Lang::get('common.submit')) }}
      </div>
      {{ Form::close() }}
    </div>

    @if(!empty($exercises))
      @foreach( $exercises as $exercise)
        <div class="list-item">
          @if(!empty($exercise->title))
            <h2 class="title">{{ $exercise->title }}</h2>
          @endif
          @if(!empty($exercise->content))
            <p class="item-lead">{{ $exercise->content }}</p>
            @endif
          <a href="{{ URL::route('exercise.view', $exercise->id) }}" class="btn btn-more">{{ trans('common.see-more') }} <i class="fa fa-long-arrow-right"></i></a>
        </div>
        <div class="clearfix"></div>
      @endforeach
      <?php echo $exercises->links(); ?>
    @endif
  </div>
@stop
