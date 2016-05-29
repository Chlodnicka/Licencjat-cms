@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header title">{{ trans('app.plugin-courses') }}</h1>
        </div>
    </div>
    <div class="courses tree edit">
        {{ Form::open(array('route' => array('tree.course', $tree->id))) }}
        <div class="form-cluster">
            <div class="form-group">
                {{ Form::label('name', Lang::get('common.title'))}}
                {{ Form::text('name', $tree->title) }}
                @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
            </div>
            <div class="form-group">
                {{ Form::label('lead', 'Lead')}}
                {{ Form::textarea('lead', $tree->lead, array('id'=>'editor')) }}
            </div>
            <div class="form-group">
                {{ Form::label('active', 'Dostępność pluginu')}}
                <input type="checkbox" name="active" id="active" value="1"
                       @if($tree->active == 1)
                       checked="checked"
                @else

                        @endif>
            </div>
            {{ Form::submit(Lang::get('common.submit')) }}
        </div>
        {{ Form::close() }}
    </div>
@stop
