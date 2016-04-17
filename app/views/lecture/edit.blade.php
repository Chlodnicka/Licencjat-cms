@section('content')
  <h1>Lecture! Edit</h1>
  <div class="edit lecture">
    <form>
      <div class="form-cluster">
        <div class="form-group">
          <label for="title">Tytuł</label>
          <input type="text" name="title" id="title">
        </div>
        <div class="form-group">
          <label for="lead">Lead</label>
          <input type="text" name="lead" id="lead">
        </div>
        <div class="form-group">
          <label for="content">Treść wykładu</label>
          <textarea name="content" id="content" rows="10" cols="30"></textarea>
        </div>
        <div class="form-group">
          <label for="date">Data</label>
          <input type="date" name="date" id="date">
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
