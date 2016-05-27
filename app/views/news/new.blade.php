@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.news-new') }}</h1>
    </div>
  </div>
  <div class="new news">
    {{ Form::open(array('route' => array('news.create', 'files'=>true))) }}
    <div class="form-cluster">

      <div class="form-group">
        {{ Form::label('title', Lang::get('common.title'))}}
        {{ Form::text('title', Input::old('title') ) }}
        @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
      </div>
      <div class="form-group">
        {{ Form::label('lead', Lang::get('common.lead'))}}
        {{ Form::text('lead', Input::old('lead')) }}
        @if ($errors->has('lead')) <p class="help-block">{{ $errors->first('lead') }}</p> @endif
      </div>
      <div class="form-group">
        {{ Form::label('image', 'Upload Image')}}
        {{ Form::file('image') }}
        {{ Form::label('img-description', 'Tekst alternatywny / opis')}}
        {{ Form::text('img-description') }}
        {{ Form::label('img-title', 'Tytuł')}}
        {{ Form::text('img-title') }}
      </div>
      <div class="form-group">
        {{ Form::label('content', Lang::get('common.content'))}}
        {{ Form::textarea('content', Input::old('content'), array('id'=>'editor')) }}
      </div>
      <div class="form-group">
        {{ Form::label('date', Lang::get('common.date'))}}
        {{ Form::input('date', 'date', Input::old('date')) }}
        @if ($errors->has('date')) <p class="help-block">{{ $errors->first('date') }}</p> @endif
      </div>
      {{ Form::label('courses', Lang::get('common.select-courses')) }}
      {{ Form::select('courses', $courses) }}
      @if ($errors->has('courses')) <p class="help-block">{{ $errors->first('courses') }}</p> @endif
      {{ Form::label('tags', Lang::get('common.tags-category')) }}
      {{ Form::select('tags[]', ($tags), null, ['multiple'=>true,'class' => 'form-control margin']) }}
              <!--tagi-->
      {{ Form::submit(Lang::get('common.submit')) }}
    </div>
    {{ Form::close() }}
  </div>
@stop
