@section('content')
  <h1>{{ trans('app.lecture-new') }}</h1>
  <div class="new lecture">
    {{ Form::open(array('route' => array('lecture.create'))) }}
    <div class="form-cluster">
      <div class="form-group">
        {{ Form::label('title', Lang::get('common.title'))}}
        {{ Form::text('title') }}
      </div>
      <div class="form-group">
        {{ Form::label('lead', Lang::get('common.lead'))}}
        {{ Form::text('lead') }}
      </div>
      <div class="form-group">
        {{ Form::label('content', Lang::get('common.content'))}}
        {{ Form::textarea('content', null, array('id'=>'editor')) }}
      </div>
      {{ Form::label('courses', Lang::get('common.select-course')) }}
      {{ Form::select('courses', $courses) }}
      {{ Form::label('tags',Lang::get('common.tags-category')) }}
      {{ Form::select('tags[]', ($tags), null, ['multiple'=>true,'class' => 'form-control margin']) }}
      {{ Form::submit(Lang::get('common.submit')) }}
    </div>
    {{ Form::close() }}
  </div>
@stop
