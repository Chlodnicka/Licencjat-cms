@section('content')
  <h1>{{ trans('app.owner-edit') }}</h1>
  <div class="new owner">
    {{ Form::open(array('route' => array('owner.update', $owner->id))) }}
    <div class="form-cluster">
      <div class="form-group">
        {{ Form::label('firstname', Lang::get('common.firstname'))}}
        {{ Form::text('firstname', $owner->firstname) }}
      </div>
      <div class="form-group">
        {{ Form::label('lastname',  Lang::get('common.lastname'))}}
        {{ Form::text('lastname', $owner->lastname) }}
      </div>
      <div class="form-group">
        {{ Form::label('email',  Lang::get('common.email'))}}
        {{ Form::text('email', $owner->email) }}
      </div>
      <div class="form-group">
        {{ Form::label('phone',  Lang::get('common.phone'))}}
        {{ Form::text('phone', $owner->phone) }}
      </div>
      <div class="form-group">
        {{ Form::label('university', Lang::get('common.university'))}}
        {{ Form::text('university', $owner->university) }}
      </div>
      <div class="form-group">
        {{ Form::label('department',  Lang::get('common.department'))}}
        {{ Form::text('department', $owner->department) }}
      </div>
      <div class="form-group">
        {{ Form::label('institute',  Lang::get('common.institute'))}}
        {{ Form::text('institute', $owner->institute) }}
      </div>
      <div class="form-group">
        {{ Form::label('tutorshipHours',  Lang::get('common.tutorship-hours'))}}<!--trzzeba to jakoś inaczaj ogarnąć -->
        {{ Form::textarea('tutorshipHours', $owner->tutorshipHours) }}
      </div>
      <div class="form-group">
        {{ Form::label('content',  Lang::get('common.description'))}}
        {{ Form::textarea('content', $owner->content, array('id'=>'editor')) }}
      </div>

      {{ Form::label('position', Lang::get('common.position')) }}
      {{ Form::select('position', $positions, $owner->position) }}

      {{ Form::submit( Lang::get('common.submit')) }}
    </div>
    {{ Form::close() }}
  </div>
@stop

