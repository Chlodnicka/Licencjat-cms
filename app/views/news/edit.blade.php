@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.news-edit') }} {{ $news->title }}</h1>
    </div>
  </div>
  <div class="action-buttons">
    <a href="{{ URL::route('news.view', $news->id) }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
  </div>
  @if(!empty($news))
    <div class="edit news">
      {{ Form::open(array('route' => array('news.update', $news->id))) }}
      <div class="form-cluster">
        <div class="form-group">
          {{ Form::label('title', Lang::get('common.title'))}}
          {{ Form::text('title', $news->title) }}
          @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
        </div>
        <div class="form-group">
          {{ Form::label('lead', Lang::get('common.lead'))}}
          {{ Form::text('lead', $news->lead) }}
          @if ($errors->has('lead')) <p class="help-block">{{ $errors->first('lead') }}</p> @endif
        </div>
        <div class="form-group">
          {{ Form::label('content', Lang::get('common.content'))}}
          {{ Form::textarea('content', $news->content, array('id'=>'editor')) }}
        </div>
        <div class="form-group">
          {{ Form::label('date', Lang::get('common.date'))}}
          {{ Form::input('date', 'date', $news->date) }}
          @if ($errors->has('date')) <p class="help-block">{{ $errors->first('date') }}</p> @endif
        </div>
        {{ Form::label('courses',Lang::get('common.select-courses')) }}
        {{ Form::select('courses', $courses, $news->course_id) }}
        @if ($errors->has('courses')) <p class="help-block">{{ $errors->first('courses') }}</p> @endif

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
