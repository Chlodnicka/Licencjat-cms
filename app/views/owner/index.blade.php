@section('content')
<div class="single-page">
  <h1>Informacje</h1>
  <div class="info">
    <div class="personal">
      <h2 class="name">{{ $owner->position }} {{ $owner->firstname }} {{ $owner->lastname }}</h2>
      <p class="institute">Katedra Lorem Ipsum</p>
      <p class="university">Uniwersytet Jagielloński</p>
      <p class="email"><a href="mailto:{{ $owner->email }}">{{ $owner->email }}</a></p>
      <p class="phone"><a href="tel:+48 {{ $owner->phone }}">+48 {{ $owner->phone }}</a></p>
    </div>
    <div class="tutorship">
      <h2>Godziny konsultacji</h2>
      <p><span>PONIEDZIAŁEK :</span> {{ $owner->tutorshipHours }}</p>
      <p><span>ŚRODA :</span> 10.30 - 12.30</p>
    </div>
  </div>
  <div class="photo">
    <img src="http://placehold.it/300x500">
  </div>
  <div class="description">
    <h2>Opis</h2>
    <p>{{ $owner->content }}</p>
  </div>
  <div class="publications">
    <h2>Publikacje</h2>
    <ul>
      <li><a href="#">Quis nostrud exercitation ullamco laboris nisi</a></li>
      <li><a href="#">Quis nostrud exercitation ullamco laboris nisi</a></li>
      <li><a href="#">Quis nostrud exercitation ullamco laboris nisi</a></li>
      <li><a href="#">Quis nostrud exercitation ullamco laboris nisi</a></li>
    </ul>
  </div>
</div>
@stop
