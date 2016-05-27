@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.owner-information') }}</h1>
    </div>
  </div>
<div class="single-page">

  @if($actions == 1)
    <div class="action-buttons">
      <a href="{{ URL::route('owner.edit') }}">{{ trans('common.edit') }}</a>
    </div>
  @endif
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
      <h2>{{ trans('app.tutorship-hours') }}</h2>
      <div>{{ $owner->tutorshipHours }}</div>
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
      <h2>{{ trans('common.description') }}</h2>
      <p>{{ $owner->content }}</p>
    </div>
  @endif
  @if(!empty($owner->publication))
    <div class="publications">
      <h2>{{ trans('common.publications') }}</h2> <!--ogarnąć załączniki-->
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
