@section('content')
  <h1>Exercise! Index</h1>
  <div class="exercises">
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

    @foreach( $exercises as $exercise)
    <div class="list-item">
      <h2 class="title">{{ $exercise->title }}</h2>
      <p class="item-lead">{{ $exercise->content }}</p>
      <a href="{{ URL::route('exercise.view', $exercise->id) }}" class="btn btn-more">Zobacz więcej <i class="fa fa-long-arrow-right"></i></a>
    </div>
    <div class="clearfix"></div>
    @endforeach
  </div>
  @yield('aside')
@stop
