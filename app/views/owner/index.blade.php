@section('content')
<div class="single-page">
  <h1>Informacje</h1>
  <a href="{{ URL::route('owner.edit') }}">Edytuj</a>
  <div class="info">
    <div class="personal">
      <h2 class="name">{{ $position }} {{ $owner->firstname }} {{ $owner->lastname }}</h2>
      @if(!empty($owner->institute))
        <p class="institute">{{ $owner->institute }}</p>
      @endif
      @if(!empty($owner->department))
        <p class="department">{{ $owner->department }}</p>
      @endif
      @if(!empty($owner->uniwersity))
        <p class="university">{{ $owner->university }}</p>
      @endif
      @if(!empty($owner->email))
        <p class="email"><a href="mailto:{{ $owner->email }}">{{ $owner->email }}</a></p>
      @endif
      @if(!empty($owner->phone))
        <p class="phone"><a href="tel:+48 {{ $owner->phone }}">+48 {{ $owner->phone }}</a></p>
      @endif
    </div>
    @if(!empty($owner->tutorshipHours))
    <div class="tutorship">
      <h2>Godziny konsultacji</h2>
      <p><span>PONIEDZIAŁEK :</span> {{ $owner->tutorshipHours }}</p><!-- ogarnąć godziny konsultacji-->
      <p><span>ŚRODA :</span> 10.30 - 12.30</p>
    </div>
    @endif
  </div>
  @if(!empty($owner->photo))
    <div class="photo">
      <img src="{{ $owner->photo }}">
    </div>
  @endif
  @if(!empty($owner->content))
    <div class="description">
      <h2>Opis</h2>
      <p>{{ $owner->content }}</p>
    </div>
  @endif
  @if(!empty($owner->publication))
    <div class="publications">
      <h2>Publikacje</h2> <!--ogarnąć załączniki-->
      <ul>
        <li><a href="#">Quis nostrud exercitation ullamco laboris nisi</a></li>
        <li><a href="#">Quis nostrud exercitation ullamco laboris nisi</a></li>
        <li><a href="#">Quis nostrud exercitation ullamco laboris nisi</a></li>
        <li><a href="#">Quis nostrud exercitation ullamco laboris nisi</a></li>
      </ul>
    </div>
  @endif
</div>
@stop
