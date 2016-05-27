@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header title">{{ trans('common.change-password') }}</h1>
        </div>
    </div>
    {{ Form::open(array('route' => array('user.change_password'))) }}
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