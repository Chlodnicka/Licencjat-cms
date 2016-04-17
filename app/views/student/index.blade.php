@section('content')
  <h1>Student! Index</h1>
  <p class="lead">Po zarejestrowaniu na kurs będziesz otrzymywał powiadomienia z nim związane - nowe wykłady, materiały, ogłoszenia dotyczące zajęć.</p>
  <div class="student-form">
      <form>
          <div class="form-group">
              <div><label for="name">Imię</label><input type="text" name="name" id="name"></div>
              <div><label for="surname">Nazwisko</label><input type="text" name="surname" id="surname"></div>
          </div>
          <div class="form-group">
              <div><label for="email">E-mail</label><input type="email" name="email" id="email"></div>
              <div>
                  <label for="course">Kurs</label>
                  <select name="course" id="course">
                      <option value="volvo">Volvo</option>
                      <option value="saab">Saab</option>
                      <option value="mercedes">Mercedes</option>
                      <option value="audi">Audi</option>
                  </select>
              </div>
          </div>
          <input type="submit" value="Submit">
      </form>
    </div>
@stop
