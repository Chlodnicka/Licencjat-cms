@section('content')
<div class="single-page">
  <h1>Informacje</h1>
  <a href="{{ URL::route('owner.edit') }}">Edytuj</a>
  <div class="info">
    <div class="personal">
      <h2 class="name">{{ $position }} {{ $owner->firstname }} {{ $owner->lastname }}</h2>
      <p class="institute">{{ $owner->institute }}</p>
      <p class="department">{{ $owner->department }}</p>
      <p class="university">{{ $owner->university }}</p>
      <p class="email"><a href="mailto:{{ $owner->email }}">{{ $owner->email }}</a></p>
      <p class="phone"><a href="tel:+48 {{ $owner->phone }}">+48 {{ $owner->phone }}</a></p>
    </div>
    <div class="tutorship">
      <h2>Godziny konsultacji</h2>
      <p><span>PONIEDZIAŁEK :</span> {{ $owner->tutorshipHours }}</p><!-- ogarnąć godziny konsultacji-->
      <p><span>ŚRODA :</span> 10.30 - 12.30</p>
    </div>
  </div>
  <div class="photo">
    <img src="{{ $owner->photo }}">
  </div>
  <div class="description">
    <h2>Opis</h2>
    <p>{{ $owner->content }}</p>
  </div>
  <div class="publications">
    <h2>Publikacje</h2> <!--ogarnąć załączniki-->
    <ul>
      <li><a href="#">Quis nostrud exercitation ullamco laboris nisi</a></li>
      <li><a href="#">Quis nostrud exercitation ullamco laboris nisi</a></li>
      <li><a href="#">Quis nostrud exercitation ullamco laboris nisi</a></li>
      <li><a href="#">Quis nostrud exercitation ullamco laboris nisi</a></li>
    </ul>
  </div>
</div>
@stop
