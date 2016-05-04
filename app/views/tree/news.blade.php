@section('content')
    <h1>news! Edit</h1>
    <div class="news tree edit">
        {{ Form::open(array('route' => array('tree.news', $tree->id))) }}
        <div class="form-cluster">
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