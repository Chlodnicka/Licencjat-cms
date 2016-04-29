@section('content')
  <h1>Owner! Edit</h1>
  <div class="new owner">
    {{ Form::open(array('route' => array('owner.update', $owner->id))) }}
    <div class="form-cluster">
      <div class="form-group">
        {{ Form::label('firstname', 'Imię')}}
        {{ Form::text('firstname', $owner->firstname) }}
      </div>
      <div class="form-group">
        {{ Form::label('lastname', 'Nazwisko')}}
        {{ Form::text('lastname', $owner->lastname) }}
      </div>
      <div class="form-group">
        {{ Form::label('email', 'E-mail')}}
        {{ Form::text('email', $owner->email) }}
      </div>
      <div class="form-group">
        {{ Form::label('phone', 'Telefon')}}
        {{ Form::text('phone', $owner->phone) }}
      </div>
      <div class="form-group">
        {{ Form::label('university', 'Uniwersytet')}}
        {{ Form::text('university', $owner->university) }}
      </div>
      <div class="form-group">
        {{ Form::label('department', 'Wydział')}}
        {{ Form::text('department', $owner->department) }}
      </div>
      <div class="form-group">
        {{ Form::label('institute', 'Instytut / Katedra')}}
        {{ Form::text('institute', $owner->institute) }}
      </div>
      <div class="form-group">
        {{ Form::label('tutorshipHours', 'Godziny konsultacji')}}<!--trzzeba to jakoś inaczaj ogarnąć -->
        {{ Form::textarea('tutorshipHours', $owner->tutorshipHours) }}
      </div>
      <div class="form-group">
        {{ Form::label('content', 'Opis')}}
        {{ Form::textarea('content', $owner->content, array('id'=>'editor')) }}
      </div>

      {{ Form::label('position','Select Course:') }}
      {{ Form::select('position', $positions, $owner->position) }}

      {{ Form::submit('Submit') }}
    </div>
    {{ Form::close() }}
  </div>
@stop

