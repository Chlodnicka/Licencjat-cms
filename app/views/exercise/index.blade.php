@section('content')
  <h1>Exercise! Index</h1>
  <div class="exercises">
    <h2>Filtruj</h2>
    <form>
      <label for="content">Treść</label><input type="text" name="content">
      <label for="category">Kategoria</label>
      <select name="category">
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="mercedes">Mercedes</option>
        <option value="audi">Audi</option>
      </select>
      <label for="difficulty">Trudność</label>
      <select name="difficulty">
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="mercedes">Mercedes</option>
        <option value="audi">Audi</option>
      </select>
      <div class="form-tags">
        <label>Tagi</label>
        <input type="checkbox" name="vehicle" id="vehicle" value="Bike"><label for="vehicle"><span></span>I have a bike</label>
        <input type="checkbox" name="vehicle2" id="vehicle2" value="Car"><label for="vehicle2"><span></span>I have a car</label>
        <input type="submit" value="Submit">
      </div>
    </form>
    <div class="list-item">
      <h2 class="title">Lorem ipsum</h2>
      <p class="item-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.//do 250</p>
      <a href="{{ URL::route('exercise.view') }}" class="btn btn-more">Zobacz więcej <i class="fa fa-long-arrow-right"></i></a>
    </div>
    <div class="clearfix"></div>
    <div class="list-item">
      <h2 class="title">Lorem ipsum</h2>
      <p class="item-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <a href="{{ URL::route('exercise.view') }}" class="btn btn-more">Zobacz więcej <i class="fa fa-long-arrow-right"></i></a>
    </div>
    <div class="clearfix"></div>
    <div class="list-item">
      <h2 class="title">Lorem ipsum</h2>
      <p class="item-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <a href="{{ URL::route('exercise.view') }}" class="btn btn-more">Zobacz więcej <i class="fa fa-long-arrow-right"></i></a>
    </div>
    <div class="clearfix"></div>
    <div class="list-item">
      <h2 class="title">Lorem ipsum</h2>
      <p class="item-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <a href="{{ URL::route('exercise.view') }}" class="btn btn-more">Zobacz więcej <i class="fa fa-long-arrow-right"></i></a>
    </div>
    <div class="clearfix"></div>
    <div class="list-item">
      <h2 class="title">Lorem ipsum</h2>
      <p class="item-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <a href="{{ URL::route('exercise.view') }}" class="btn btn-more">Zobacz więcej <i class="fa fa-long-arrow-right"></i></a>
    </div>
    <div class="clearfix"></div>
  </div>
  </div>
  @yield('aside')
@stop
