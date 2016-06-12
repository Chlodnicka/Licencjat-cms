@section('content')

    <h1>{{ trans('common.log-in') }}</h1>

    <!-- if there are login errors, show them here -->
    <p>
        {{ $errors->first('email') }}
        {{ $errors->first('password') }}
    </p>
    <div class="login">
        {{ Form::open(array('url' => 'login')) }}
        {{ Form::label('email', Lang::get('common.email')) }}
        {{ Form::text('email', Input::old('email'), array('placeholder' => 'adres@email.com')) }}
        {{ Form::label('password', Lang::get('common.password')) }}
        {{ Form::password('password') }}


        {{ Form::submit(Lang::get('common.submit')) }}
        {{ Form::close() }}
    </div>

@stop