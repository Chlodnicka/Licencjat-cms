@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.lecture-edit') }} {{ $lecture->name }}</h1>
    </div>
  </div>
  @if(!empty($lecture))
    <div class="edit lecture">
      {{ Form::open(array('route' => array('lecture.update', $lecture->id))) }}
      <div class="form-cluster">
        <div class="form-group">
          {{ Form::label('title', Lang::get('common.title'))}}
          {{ Form::text('title', $lecture->title) }}
          @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
        </div>
        <div class="form-group">
          {{ Form::label('lead', Lang::get('common.lead'))}}
          {{ Form::text('lead', $lecture->lead) }}
          @if ($errors->has('lead')) <p class="help-block">{{ $errors->first('lead') }}</p> @endif
        </div>
        <div class="form-group">
          {{ Form::label('content', Lang::get('common.content'))}}
          {{ Form::textarea('content', $lecture->content, array('id'=>'editor')) }}
        </div>
        {{ Form::label('courses', Lang::get('common.select-course')) }}
        {{ Form::select('courses', $courses, $lecture->course_id) }}
        {{ Form::label('tags', Lang::get('common.tags-category')) }}
        {{ Form::select('tags[]', ($tags), ($lecture_tags), ['multiple'=>true,'class' => 'form-control margin']) }}
                <!--tagi-->
        {{ Form::submit(Lang::get('common.submit')) }}
      </div>
      {{ Form::close() }}
    </div>
  @else
    <p class="no-result">{{ trans('no-such-lecture') }}</p>
  @endif
@stop
