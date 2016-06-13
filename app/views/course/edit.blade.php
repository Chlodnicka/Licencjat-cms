@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">{{ trans('app.course-edit') }} {{ $course->name }}</h1>
    </div>
  </div>
  <div class="action-buttons">
    <a href="{{ URL::route('course.view', $course->id) }}" class="btn btn-default btn-back"><i class="fa fa-long-arrow-left"></i>  {{ trans('common.back') }} </a>
  </div>
  @if (!empty($course))
    <div class="edit course">
      {{ Form::open(array('route' => array('course.update', $course->id))) }}
      <div class="form-cluster">
        <div class="form-group">
          {{ Form::label('name', Lang::get('common.name').'*')}}
          {{ Form::text('name', $course->name) }}
          @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
        </div>
        <div class="form-group">
          {{ Form::label('lead', Lang::get('common.lead').'*')}}
          {{ Form::text('lead', $course->lead) }}
          @if ($errors->has('lead')) <p class="help-block">{{ $errors->first('lead') }}</p> @endif
        </div>
        <div class="form-group">
          {{ Form::label('description', Lang::get('common.description'))}}
          {{ Form::textarea('description', $course->description, array('id'=>'editor')) }}
        </div>
        {{ Form::label('tags', Lang::get('common.tags-category')) }}
        {{ Form::select('tags[]', ($tags), $course_tags, ['multiple'=>true,'class' => 'form-control margin']) }}
        <p>Aby zaznaczyć więcej w danym polu przytrzymaj CTRL</p>
        {{ Form::submit(Lang::get('common.submit')) }}
      </div>
      {{ Form::close() }}
    </div>
  @else
    <p class="no-result">{{ trans('app.no-such-course') }}</p>
  @endif
@stop
