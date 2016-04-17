@section('content')
  <h1>Course! Edit</h1>
  <div class="new course">
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
          <label for="content">Opis</label>
          <textarea name="content" id="content" rows="10" cols="30"></textarea>
        </div>
        <div class="form-tags">
          <label>Tagi</label>
          <input type="checkbox" name="vehicle" id="vehicle" value="Bike"><label for="vehicle"><span></span>I have a bike</label>
          <input type="checkbox" name="vehicle2" id="vehicle2" value="Car"><label for="vehicle2"><span></span>I have a car</label>
          <input type="submit" value="Submit">
        </div>
      </div>
    </form>
  </div>
@stop
