@section('content')
  <h1>News! Edit</h1>
  @if(!empty($news))
    <div class="edit news">
      {{ Form::open(array('route' => array('news.update', $news->id))) }}
      <div class="form-cluster">
        <div class="form-group">
          {{ Form::label('title', 'Tytuł')}}
          {{ Form::text('title', $news->title) }}
        </div>
        <div class="form-group">
          {{ Form::label('lead', 'Lead')}}
          {{ Form::text('lead', $news->lead) }}
        </div>
        <div class="form-group">
          {{ Form::label('content', 'Treść')}}
          {{ Form::textarea('content', $news->content, array('id'=>'editor')) }}
        </div>
        <div class="form-group">
          {{ Form::label('date', 'Data')}}
          {{ Form::input('date', 'date', $news->date) }}
        </div>
        {{ Form::label('courses','Select Course:') }}
        {{ Form::select('courses', $courses, $news->course_id) }}

        {{ Form::label('tags','Select Category:') }}
        {{ Form::select('tags[]', ($tags), $news_tags, ['multiple'=>true,'class' => 'form-control margin']) }}
                <!--tagi-->
        {{ Form::submit('Submit') }}
      </div>
      {{ Form::close() }}
    </div>
  @else
    <p class="no-result">Dana aktualność nie istnieje</p>
  @endif
@stop
