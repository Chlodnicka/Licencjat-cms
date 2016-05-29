@section('content')
    {{ Form::open(array('url' => 'login')) }}
    <h1>{{ trans('common.log-in') }}</h1>

    <!-- if there are login errors, show them here -->
    <p>
        {{ $errors->first('email') }}
        {{ $errors->first('password') }}
    </p>

    <p>
        {{ Form::label('email', Lang::get('common.email')) }}
        {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) }}
    </p>

    <p>
        {{ Form::label('password', Lang::get('common.password')) }}
        {{ Form::password('password') }}
    </p>

    <p>{{ Form::submit(Lang::get('common.submit')) }}</p>
    {{ Form::close() }}
@stop