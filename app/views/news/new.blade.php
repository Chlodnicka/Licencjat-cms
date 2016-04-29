@section('content')
  <h1>News! New</h1>
  <div class="new news">
    {{ Form::open(array('route' => array('news.create'))) }}
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
        {{ Form::textarea('content', null, array('id'=>'editor')) }}
      </div>
      <div class="form-group">
        {{ Form::label('date', 'Data')}}
        {{ Form::input('date', 'date') }}
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
