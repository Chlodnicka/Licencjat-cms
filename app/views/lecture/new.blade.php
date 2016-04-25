@section('content')
  <h1>Lecture! New</h1>
  <div class="new lecture">
    {{ Form::open(array('route' => array('lecture.create'))) }}
    <div class="form-cluster">
      <div class="form-group">
        {{ Form::label('title', 'Tytuł')}}
        {{ Form::text('title') }}
      </div>
      <div class="form-group">
        {{ Form::label('lead', 'Lead')}}
        {{ Form::text('lead') }}
      </div>
      <div class="form-group">
        {{ Form::label('content', 'Treść')}}
        {{ Form::textarea('content') }}
      </div>
      {{ Form::label('courses','Select Course:') }}
      {{ Form::select('courses', $courses) }}
      {{ Form::label('tags','Select Category:') }}
      {{ Form::select('tags[]', ($tags), null, ['multiple'=>true,'class' => 'form-control margin']) }}
              <!--tagi-->
      {{ Form::submit('Submit') }}
    </div>
    {{ Form::close() }}
  </div>
@stop
