@section('content')
  <h1>Student! Edit</h1>
  <p class="lead">Po zarejestrowaniu na kurs będziesz otrzymywał powiadomienia z nim związane - nowe wykłady, materiały, ogłoszenia dotyczące zajęć.</p>
  <div class="student-form">
    <form action="{{ URL::route('student.update', $student->id) }}" method="post">
      <div class="form-group">
        <div><label for="fistnamename">Imię</label><input type="text" name="firstname" id="firstname"></div>
        <div><label for="lastname">Nazwisko</label><input type="text" name="lastname" id="lastname"></div>
      </div>
      <div class="form-group">
        <div><label for="email">E-mail</label><input type="email" name="email" id="email"></div>
        <div>
          <label for="course">Kurs</label>
          <select name="course" id="course">
            <option value="1">Volvo</option>
            <option value="2">Saab</option>
            <option value="3">Mercedes</option>
            <option value="4">Audi</option>
          </select>
        </div>
      </div>
      <input type="submit" value="Submit">
    </form>
  </div>
@stop
