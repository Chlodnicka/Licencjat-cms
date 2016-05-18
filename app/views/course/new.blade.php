@section('content')
  <h1>{{ trans('app.create-new-course') }}</h1>
  <div class="new course">
    {{ Form::open(array('route' => array('course.create'))) }}
      <div class="form-cluster">
        <div class="form-group">
          {{ Form::label('name', Lang::get('common.name'))}}
          {{ Form::text('name',Input::old('name')) }}
          @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
        </div>
        <div class="form-group">
          {{ Form::label('lead', Lang::get('common.lead'))}}
          {{ Form::text('lead', Input::old('lead')) }}
          @if ($errors->has('lead')) <p class="help-block">{{ $errors->first('lead') }}</p> @endif
        </div>
        <div class="form-group">
          {{ Form::label('description', Lang::get('common.description'))}}
          {{ Form::textarea('description', Input::old('description'), array('id'=>'editor')) }}
        </div>
        {{ Form::label('tags', Lang::get('common.tags-category')) }}
        {{ Form::select('tags[]', ($tags), null, ['multiple'=>true,'class' => 'form-control margin']) }}
        <!--tagi-->
        {{ Form::submit(Lang::get('common.submit')) }}
      </div>
    {{ Form::close() }}
  </div>
@stop
