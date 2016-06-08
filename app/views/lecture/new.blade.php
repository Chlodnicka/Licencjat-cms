@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.lecture-new') }}</h1>
    </div>
  </div>
  <div class="new lecture">
      <div class="action-buttons">
        <a href="{{ URL::route('lecture.index') }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>{{ trans('common.back') }}</a>
      </div>
    {{ Form::open(array('route' => array('lecture.create'), 'files' => true)) }}
    <div class="form-cluster">
      <div class="form-group">
        {{ Form::label('title', Lang::get('common.title'))}}
        {{ Form::text('title', Input::old('title')) }}
        @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
      </div>
      <div class="form-group">
        {{ Form::label('lead', Lang::get('common.lead'))}}
        {{ Form::text('lead', Input::old('lead')) }}
        @if ($errors->has('lead')) <p class="help-block">{{ $errors->first('lead') }}</p> @endif
      </div>
      <div class="form-group">
        {{ Form::label('image', Lang::get('app.upload-img'))}}
        {{ Form::file('image') }}
      </div>
      <div class="form-group">
        {{ Form::label('img-description', Lang::get('app.attach-description'))}}
        {{ Form::text('img-description') }}
      </div>
      <div class="form-group">
        {{ Form::label('img-title', Lang::get('app.attach-title'))}}
        {{ Form::text('img-title') }}
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
