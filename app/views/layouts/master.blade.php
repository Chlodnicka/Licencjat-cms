<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html lang="PL-pl">
  <head>
	 <meta http-equiv="content-type" content="text/html; charset=utf-8">
	 <title>Strona domowa</title>
   <link href="{{ URL::asset('/assets/css/default.min.css') }}" rel="stylesheet">
  </head>
  <body>
    <header>
      <nav>

          <div class="logo"><p>Adam Kowalski</p></div>
          <div class="main-menu">
            <ul>
              <li>{{ HTML::linkRoute('owner.index', 'kontakt', array(), array('class' => 'btn btn-menu')) }}</li>
              <li>{{ HTML::linkRoute('news.index', 'aktualności', array(), array('class' => 'btn btn-menu')) }}</li>
              <li>{{ HTML::linkRoute('course.index', 'kursy', array(), array('class' => 'btn btn-menu')) }}</li>
              <li>{{ HTML::linkRoute('student.new', 'rejestracja', array(), array('class' => 'btn btn-menu')) }}</li>
            </ul>
          </div>

        <div class="side-menu">
          <div class="side-menu-search">
            <form action="" method="">
              <input type="text" name="searchQuery" value="seek">
              <div class="btn-search"><input type="submit" value=""></div>
            </form>
          </div>
          <div class="side-menu-login"></div>
        </div>
      </nav>
    </header>

    <article>
      @yield('content')
    </article>

    <footer>
      <div class="container">
        <div class="sitemap">
          <div>
            <h4><a href="">Serwis</a></h4>
            <ul>
              <a href=""><li>Kontakt</li></a>
              <a href=""><li>Aktualności</li></a>
              <a href=""><li>Rejestracja</li></a>
            </ul>
          </div>
          <div>
            <h4><a href="">Kursy</a></h4>
            <ul>
              <a href=""><li>Kurs 1</li></a>
              <a href=""><li>Kurs 2</li></a>
              <a href=""><li>Kurs 3</li></a>
              <a href=""><li>Kurs 4</li></a>
            </ul>
          </div>
        </div>
        <div class="copyrights">
          <p class="content">copyright by Adam Kowalski</p>
          <p class="powered">powered by Maja Chłodnicka</p>
        </div>
      </div>
    </footer>
    <script src="{{ URL::asset('/assets/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.js') }}"></script>
  </body>
</html>
