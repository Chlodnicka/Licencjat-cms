@section('content')
    {{ Form::open(array('route' => array('user.doRegister'))) }}
    <h2 class="form-signup-heading">Please Register</h2>

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    {{ Form::text('username', null, array('class'=>'input-block-level', 'placeholder'=>'Username')) }}
    {{ Form::text('name', null, array('class'=>'input-block-level', 'placeholder'=>'Last Name')) }}
    {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
    {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
    {{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirm Password')) }}

    {{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block'))}}
    {{ Form::close() }}
@stop
