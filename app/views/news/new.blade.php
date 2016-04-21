@section('content')
  <h1>News! New</h1>
  <div class="new news">
    <form action="{{  URL::route('news.create')  }}" method="post">
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
          <label for="content">Treść wiadomości</label>
          <textarea name="content" id="content" rows="10" cols="30"></textarea>
        </div>
        <div class="form-group">
          <label for="date">Data</label>
          <input type="date" name="date" id="date">
        </div>
        <div class="form-group">
          <label for="course">Kurs</label>
          <select name="course" id="course">
            <option value="1">Volvo</option>
            <option value="2">Saab</option>
            <option value="3">Fiat</option>
            <option value="4">Audi</option>
          </select>
        </div>
        <div class="form-tags">
          <label>Tagi</label>
          <input type="checkbox" name="vehicle" id="vehicle" value="Bike"><label for="vehicle"><span></span>I have a bike</label>
          <input type="checkbox" name="vehicle2" id="vehicle2" value="Car"><label for="vehicle2"><span></span>I have a car</label>
        </div>
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
@stop
