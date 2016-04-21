@section('content')
  <h1>Owner! Edit</h1>
  <div class="new owner">
    <form action="{{ URL::route('owner.update')  }}" method="post">
      <div class="form-cluster">
        <div class="form-group">
          <label for="firstname">Imię</label>
          <input type="text" name="firstname" id="firstname">
        </div>
        <div class="form-group">
          <label for="lastname">Nazwisko</label>
          <input type="text" name="lastname" id="lastname">
        </div>
        <!--<div class="form-group">
          <label for="password">Hasło</label>
          <input type="text" name="password" id="password">
        </div>-->
        <div class="form-group">
          <label for="email">Adres e-mail</label>
          <input type="email" name="email" id="email">
        </div>
        <div class="form-group">
          <label for="phone">Telefon</label>
          <input type="number" id="phone" name="phone">
        </div>
      </div>
      <div class="form-cluster">
        <div class="form-group">
          <label for="position">Tytuł naukowy</label>
          <select name="position" id="position">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="fiat">Fiat</option>
            <option value="audi">Audi</option>
          </select>
        </div>
        <div class="form-group">
          <label for="university">Uniwerystet</label>
          <input type="text" name="university" id="university">
        </div>
        <div class="form-group">
          <label for="department">Wydział</label>
          <input type="text" name="department" id="department">
        </div>
        <div class="form-group">
          <label for="institute">Katedra / Instytut</label>
          <input type="text" name="institute" id="institute">
        </div>
        <div class="form-group">
          <label for="tutorshipHours">Godziny konsultacji</label>
          <textarea name="tutorshipHours" id="tutorshipHours" rows="10" cols="30"></textarea>
        </div>
      </div>
      <div class="form-cluster">
        <div class="form-group">
          <label for="description">Opis</label>
          <textarea name="tutorshipHours" id="tutorshipHours" rows="10" cols="30"></textarea>
        </div>
      </div>
      <!--<div class="form-cluster">
        <div class="form-group">
          <label for="attachments">Publikacje</label>
          <input type="file" id="attachments" name="attachments">
        </div>-->
      </div>
      <input type="submit" value="Submit">
    </form>
  </div>
@stop

