@section('content')
  <h1>Exercise! Edit</h1>
    <div class="new lecture">
      <form>
        <div class="form-cluster">
          <div class="form-group">
            <label for="title">Tytuł</label>
            <input type="text" id="title" name="title">
          </div>
          <div class="form-group">
            <label for="difficulty">Trudność</label>
            <select name="difficulty" id="difficulty">
              <option value="volvo">Volvo</option>
              <option value="saab">Saab</option>
              <option value="fiat">Fiat</option>
              <option value="audi">Audi</option>
            </select>
          </div>
          <div class="form-group">
            <label for="content">Treść zadania</label>
            <textarea name="content" id="content" rows="10" cols="30"></textarea>
          </div>
          <div class="form-group">
            <label for="content">Rozwiązanie</label>
            <textarea name="content" id="content" rows="10" cols="30"></textarea>
          </div>
          <div class="form-group">
            <label for="course">Kurs</label>
            <select name="course" id="course">
              <option value="volvo">Volvo</option>
              <option value="saab">Saab</option>
              <option value="fiat">Fiat</option>
              <option value="audi">Audi</option>
            </select>
          </div>
          <div class="form-group">
            <label for="lecture">Lecture</label>
            <select name="lecture" id="lecture">
              <option value="volvo">Volvo</option>
              <option value="saab">Saab</option>
              <option value="fiat">Fiat</option>
              <option value="audi">Audi</option>
            </select>
          </div>
          <div class="form-tags">
            <label>Tagi</label>
            <input type="checkbox" name="vehicle" id="vehicle" value="Bike"><label for="vehicle"><span></span>I have a bike</label>
            <input type="checkbox" name="vehicle2" id="vehicle2" value="Car"><label for="vehicle2"><span></span>I have a car</label>
          </div>
          <div class="form-attachments">
            <label for="attachments">Załączniki</label>
            <input type="file" id="attachments" name="attachments">
          </div>
        </div>
        <input type="submit" value="Submit">
      </form>
    </div>
@stop
