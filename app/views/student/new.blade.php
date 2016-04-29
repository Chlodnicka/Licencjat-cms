@section('content')
  <h1>Student! New</h1>
  <p class="lead">Po zarejestrowaniu na kurs będziesz otrzymywał powiadomienia z nim związane - nowe wykłady, materiały, ogłoszenia dotyczące zajęć.</p>
  <div class="student-form">
    <form action="{{ URL::route('student.create') }}" method="post">
      <div class="form-group">
        <div><label for="fistnamename">Imię</label><input type="text" name="firstname" id="firstname"></div>
        <div><label for="lastname">Nazwisko</label><input type="text" name="lastname" id="lastname"></div>
      </div>
      <div class="form-group">
        <div><label for="email">E-mail</label><input type="email" name="email" id="email"></div>
        {{ Form::label('courses','Select Course:') }}
        {{ Form::select('courses', $courses) }}
      </div>
      <input type="submit" value="Submit">
    </form>
  </div>
@stop
