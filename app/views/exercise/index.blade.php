@section('content')
  <h1>Exercise! Index</h1>
  @if(!empty($exercise_lead->lead))
    <p class="lead">{{ $exercise_lead->lead }}</p>
  @endif
  <a href="{{ URL::route('exercise.new') }}">Nowy</a>
  <div class="exercises index">
    <div class="filter-box">
      <h2>Filtruj</h2>
      {{ Form::open(array('route' => array('exercise.search'))) }}
      <div class="form-cluster">
        <div class="form-group">
          {{ Form::label('content', 'Treść')}}
          {{ Form::text('content') }}
        </div>
        <div class="form-group">
          {{ Form::label('solutionAccess', 'Rozwiązanie')}}
          {{ Form::checkbox('solution_access', true) }}
        </div>
        {{ Form::label('difficulty','Trudność:') }}
        {{ Form::select('difficulty', $difficulty) }}
                <!--tagi-->
        {{ Form::submit('Submit') }}
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
          <a href="{{ URL::route('exercise.view', $exercise->id) }}" class="btn btn-more">Zobacz więcej <i class="fa fa-long-arrow-right"></i></a>
        </div>
        <div class="clearfix"></div>
      @endforeach
    @endif
  </div>
  @yield('aside')
@stop
