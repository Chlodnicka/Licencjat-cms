@section('content')
    {{ Form::open(array('route' => array('user.change_password'))) }}
    <h3 class="">Change Password</h3>
    <h6>Please change your password below.</h6>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Old Password')) }}
    {{ Form::password('new_password', array('class'=>'input-block-level', 'placeholder'=>'New Password')) }}
    {{ Form::password('new_password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirm New Password')) }}


    {{ Form::submit('Change', array('class'=>'k-button'))}}
    {{ Form::close() }}
@stop