@section('content')
  <h1>{{ trans('app.news-edit') }} {{ $news->title }}</h1>
  @if(!empty($news))
    <div class="edit news">
      {{ Form::open(array('route' => array('news.update', $news->id))) }}
      <div class="form-cluster">
        <div class="form-group">
          {{ Form::label('title', Lang::get('common.title'))}}
          {{ Form::text('title', $news->title) }}
        </div>
        <div class="form-group">
          {{ Form::label('lead', Lang::get('common.lead'))}}
          {{ Form::text('lead', $news->lead) }}
        </div>
        <div class="form-group">
          {{ Form::label('content', Lang::get('common.content'))}}
          {{ Form::textarea('content', $news->content, array('id'=>'editor')) }}
        </div>
        <div class="form-group">
          {{ Form::label('date', Lang::get('common.date'))}}
          {{ Form::input('date', 'date', $news->date) }}
        </div>
        {{ Form::label('courses',Lang::get('common.select-courses')) }}
        {{ Form::select('courses', $courses, $news->course_id) }}

        {{ Form::label('tags', Lang::get('common.tags-category')) }}
        {{ Form::select('tags[]', ($tags), $news_tags, ['multiple'=>true,'class' => 'form-control margin']) }}
                <!--tagi-->
        {{ Form::submit(Lang::get('common.submit')) }}
      </div>
      {{ Form::close() }}
    </div>
  @else
    <p class="no-result">{{ trans('no-such-news-item') }}</p>
  @endif
@stop
