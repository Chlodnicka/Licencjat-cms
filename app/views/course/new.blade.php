@section('content')
  <h1>Course! New</h1>
  <div class="new course">
    {{ Form::open(array('route' => array('course.create'))) }}
      <div class="form-cluster">
        <div class="form-group">
          {{ Form::label('name', 'Nazwa')}}
          {{ Form::text('name') }}
        </div>
        <div class="form-group">
          {{ Form::label('lead', 'Lead')}}
          {{ Form::text('lead') }}
        </div>
        <div class="form-group">
          {{ Form::label('description', 'Opis')}}
          {{ Form::textarea('description') }}
        </div>
        {{ Form::label('tags','Select Category:') }}
        {{ Form::select('tags[]', ($tags), null, ['multiple'=>true,'class' => 'form-control margin']) }}
        <!--tagi-->
        {{ Form::submit('Submit') }}
      </div>
    {{ Form::close() }}
  </div>
@stop
