<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html lang="PL-pl">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <meta http-equiv="content-type" content="text/html; charset=utf-8">
	 <title>@yield('title') Strona akademicka</title>
   <link href="{{ URL::asset('/assets/css/default.min.css') }}" rel="stylesheet">
  </head>
  <body  class="default">
    <header>
      <div class="top-nav">
        <div class="logo"><a href="{{ URL::route('homepage') }}"><p>{{ trans('common.app-title') }}</p></a></div>
        <div class="side-menu">
          <div class="side-menu-search">
            <form action="{{ URL::route('search.index') }}" method="post">
              <input type="text" name="searchQuery" value="">
              <div class="btn-search"><input type="submit" value=""></div>
            </form>
          </div>
          <div class="side-menu-login">
            @if(Auth::check())
              <a href="{{ URL::route('user.logout') }}">{{ trans('common.logout') }}</a>
            @else
              <a href="{{ URL::route('user.login') }}">{{ trans('common.login') }}</a>
              @if($students->active == 1)
                <a href="{{ URL::route('user.register') }}">{{ trans('common.register') }}</a>
              @endif
            @endif
          </div>
        </div>
      </div>

      <nav>
          <div class="main-menu">
            <div class="responsive-menu">
              <button class="menu-button">Menu</button>
            </div>
              @include('layouts.menu')

          </div>
      </nav>
    </header>

    <article>
      @if (Session::has('message'))
        <div class="alert alert-success">
          <p>{{ Session::get('message') }}</p>
        </div>
      @endif
      @yield('content')
    </article>

    <footer>
        <div class="sitemap">
          <div>
            <h4>Serwis</h4>
            @include('layouts.menu')
            <a href="{{ URL::route('about.service') }}">O serwisie</a>
          </div>
          <div>
            <h4><a href="{{ URL::route('course.index') }}">{{ trans('app.courses') }}</a></h4>
            @include('layouts.courses')
          </div>
        </div>
        <div class="copyrights">
          <p class="content">{{ trans('common.copy') }} Maja Chłodnicka</p>
        </div>
    </footer>
    <script src="{{ URL::asset('/assets/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.js') }}"></script>
    <script src="{{ URL::asset('/packages/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
      CKEDITOR.replace( 'editor' );
      CKEDITOR.add;
    </script>
    <script>
      $("form").validate();
    </script>
  </body>
</html>
