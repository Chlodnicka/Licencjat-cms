@section('content')
  <h1>Course! Edit</h1>
  <div class="new course">
    <form action="{{  URL::route('course.update', $course->id)  }}" method="post">
      <div class="form-cluster">
        <div class="form-group">
          <label for="name">Tytuł</label>
          <input type="text" name="name" id="name" value="{{ $course->name }}">
        </div>
        <div class="form-group">
          <label for="lead">Lead</label>
          <input type="text" name="lead" id="lead" value="{{ $course->lead }}">
        </div>
        <div class="form-group">
          <label for="description">Opis</label>
          <textarea name="description" id="description" rows="10" cols="30" value="{{ $course->description }}"></textarea>
        </div>
        <!--<div class="form-tags">
          <label>Tagi</label>
          <input type="checkbox" name="vehicle" id="vehicle" value="Bike"><label for="vehicle"><span></span>I have a bike</label>
          <input type="checkbox" name="vehicle2" id="vehicle2" value="Car"><label for="vehicle2"><span></span>I have a car</label>

        </div>-->
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
@stop
