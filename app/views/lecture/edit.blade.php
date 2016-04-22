@section('content')
  <h1>Lecture! Edit</h1>
  <div class="edit lecture">
    <form action="{{ URL::route('lecture.update', $lecture->id) }}" method="post">
      <div class="form-cluster">
        <div class="form-group">
          <label for="title">Tytuł</label>
          <input type="text" name="title" id="title" value="{{ $lecture->title }}">
        </div>
        <div class="form-group">
          <label for="lead">Lead</label>
          <input type="text" name="lead" id="lead"  value="{{ $lecture->lead }}">
        </div>
        <div class="form-group">
          <label for="content">Treść wykładu</label>
          <textarea name="content" id="content" rows="10" cols="30"  value="{{ $lecture->content }}"></textarea>
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
        <!--<div class="form-tags">
          <label>Tagi</label>
          <input type="checkbox" name="vehicle" id="vehicle" value="Bike"><label for="vehicle"><span></span>I have a bike</label>
          <input type="checkbox" name="vehicle2" id="vehicle2" value="Car"><label for="vehicle2"><span></span>I have a car</label>
        </div>
        <div class="form-attachments">
          <label for="attachments">Załączniki</label>
          <input type="file" id="attachments" name="attachments">
        </div>-->
      </div>
      <input type="submit" value="Submit">
    </form>
  </div>
@stop
