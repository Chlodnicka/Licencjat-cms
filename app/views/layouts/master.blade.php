<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html lang="PL-pl">
  <head>
	 <meta http-equiv="content-type" content="text/html; charset=utf-8">
	 <title>@yield('title') {{ trans('common.homepage') }}</title>
   <link href="{{ URL::asset('/assets/css/default.min.css') }}" rel="stylesheet">
  </head>
  <body>
    <header>
      <div class="top-nav">
        <div class="logo"><a href="/"><p>kursy i materiały</p></a></div>
        <div class="side-menu">
          <div class="side-menu-search">
            <form action="{{ URL::route('search.index') }}" method="post">
              <input type="text" name="searchQuery" value="seek">
              <div class="btn-search"><input type="submit" value=""></div>
            </form>
          </div>
          <div class="side-menu-login"></div>
        </div>
      </div>

      <nav>
          <div class="main-menu">
              @include('layouts.menu')
          </div>
      </nav>
    </header>

    <article>
      @if (Session::has('message'))
        <div class="session-alert">
          <p>{{ Session::get('message') }}</p>
        </div>
      @endif
      @yield('content')
    </article>

    <footer>
      <div class="container">
        <div class="sitemap">
          <div>
            <h4><a href="">{{ trans('common.sitemap') }}</a></h4>
            @include('layouts.menu')
          </div>
          <div>
            <h4><a href="">{{ trans('app.courses') }}</a></h4>
            @include('layouts.courses')
          </div>
        </div>
        <div class="copyrights">
          <p class="content">{{ trans('common.copy') }} {{ $owner->firstname }} {{ $owner->lastname }}</p>
          <p class="powered">{{ trans('common.powered') }} </p>
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
