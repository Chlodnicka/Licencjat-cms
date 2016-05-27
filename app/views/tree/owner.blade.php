@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header title">{{ trans('app.plugin-owner') }}</h1>
        </div>
    </div>
    <div class="owner tree edit">
        {{ Form::open(array('route' => array('tree.owner', $tree->id))) }}
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
                {{ Form::checkbox('active', $tree->active, true) }}
            </div>
            {{ Form::submit('Submit') }}
        </div>
        {{ Form::close() }}
    </div>
@stop
