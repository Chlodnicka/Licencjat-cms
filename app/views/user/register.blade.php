@section('content')

    <h2 class="form-signup-heading">{{ trans('common.register-yourself') }}</h2>

    <div class="register">

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        {{ Form::open(array('route' => array('user.doRegister'))) }}
        {{ Form::text('username', null, array('class'=>'input-block-level', 'placeholder'=>Lang::get('common.username'))) }}
        {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>Lang::get('common.email'))) }}
        {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>Lang::get('common.password'))) }}
        {{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>Lang::get('common.confirm-password'))) }}

        {{ Form::submit(Lang::get('common.submit'), array('class'=>'btn btn-large btn-primary btn-block'))}}
        {{ Form::close() }}
    </div>

@stop
