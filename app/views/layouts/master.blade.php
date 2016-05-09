<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html lang="PL-pl">
  <head>
	 <meta http-equiv="content-type" content="text/html; charset=utf-8">
	 <title>@yield('title') Strona domowa</title>
   <link href="{{ URL::asset('/assets/css/default.min.css') }}" rel="stylesheet">
  </head>
  <body>
    <header>
      <nav>

          <div class="logo"><a href="/"><p>{{ $owner->firstname }} {{ $owner->lastname }}</p></a></div>
          <div class="main-menu">
              @include('layouts.menu')
          </div>

        <div class="side-menu">
          <div class="side-menu-search">
            <form action="{{ URL::route('search.index') }}" method="post">
              <input type="text" name="searchQuery" value="seek">
              <div class="btn-search"><input type="submit" value=""></div>
            </form>
          </div>
          <div class="side-menu-login"></div>
        </div>
      </nav>
    </header>

    <article>
      @if (Session::has('message'))
        <div class="alert">{{ Session::get('message') }}</div>
      @endif
      @yield('content')
    </article>

    <footer>
      <div class="container">
        <div class="sitemap">
          <div>
            <h4><a href="">Serwis</a></h4>
            @include('layouts.menu')
          </div>
          <div>
            <h4><a href="">Kursy</a></h4>
            @include('layouts.courses')
          </div>
        </div>
        <div class="copyrights">
          <p class="content">copyright by {{ $owner->firstname }} {{ $owner->lastname }}</p>
          <p class="powered">powered by </p>
        </div>
      </div>
    </footer>
    <script src="{{ URL::asset('/assets/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.js') }}"></script>
    <script src="{{ URL::asset('/packages/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
      CKEDITOR.replace( 'editor' );
      CKEDITOR.add;
    </script>
  </body>
</html>
