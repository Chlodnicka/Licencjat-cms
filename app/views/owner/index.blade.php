@section('content')
<div class="single-page">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.owner-information') }}</h1>
    </div>
  </div>
  @if($actions == 1)
    <div class="action-buttons">
      <a href="{{ URL::route('dashboard') }}" class="btn btn-default btn-back"><i class="fa fa-long-arrow-left"></i>  {{ trans('common.back') }} </a>
      <a class="btn btn-primary" href="{{ URL::route('owner.edit') }}">{{ trans('common.edit') }}</a>
    </div>
  @endif
  <div class="info">
    <div class="personal">
      <h2 class="name">{{ $position }} {{ $owner->firstname }} {{ $owner->lastname }}</h2>
      @if(!empty($owner->institute))
        <p class="institute">{{ trans('app.institute') }}: {{ $owner->institute }}</p>
      @endif
      @if(!empty($owner->department))
        <p class="department">{{ trans('app.department') }}: {{ $owner->department }}</p>
      @endif
      @if(!empty($owner->university))
        <p class="university">{{ trans('app.university') }}: {{ $owner->university }}</p>
      @endif
      @if(!empty($owner->email))
        <p class="email"><a href="mailto:{{ $owner->email }}">{{ trans('app.email') }}: {{ $owner->email }}</a></p>
      @endif
      @if(!empty($owner->phone))
        <p class="phone"><a href="tel:+48 {{ $owner->phone }}">{{ trans('app.phone') }}: +48 {{ $owner->phone }}</a></p>
      @endif
      @if(!empty($owner->attachment_id))
        @foreach($attachment as $item)
          {{ HTML::image($item->url) }}
        @endforeach
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
