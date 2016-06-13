<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html lang="PL-pl">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>@yield('title') {{ trans('common.homepage') }}</title>
    <link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/css/timeline.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/css/morris.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/css/default.min.css') }}" rel="stylesheet">
</head>
<body class="admin">
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ URL::route('dashboard') }}">{{ trans('common.app-title') }} - {{ $owner->firstname }} {{ $owner->lastname }}</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-users fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        @foreach($students_list as $student_item)
                        <li>
                            <a href="{{ URL::route('student.view', $student_item->id) }}">
                                <div>
                                    <strong>{{ $student_item->email }}</strong>
                                    <span class="text-muted">
                                        <em>{{ $student_item->created_at }}</em>
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        @endforeach
                        <li>
                            <a class="text-center" href="{{ URL::route('student.index') }}">
                                <strong>{{ trans('common.see-all-students') }}</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-gear fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ URL::route('owner.edit') }}"><i class="fa fa-user fa-fw"></i> {{ trans('common.user-profile') }}</a>
                        </li>
                        <li><a href="{{ URL::route('user.change_password') }}"><i class="fa fa-gear fa-fw"></i> {{ trans('common.change_password') }}</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            @if(Auth::check())
                                <a href="{{ URL::route('user.logout') }}">{{ trans('common.logout') }}</a>
                            @else
                                <a href="{{ URL::route('user.login') }}">{{ trans('common.login') }}</a>
                            @endif
                        </li>
                    </ul>

                </li>

            </ul>


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav in" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">

                                    <form action="{{ URL::route('search.index') }}" method="post">
                                        <input type="text" name="searchQuery" value="" class="form-control" placeholder="{{ trans('common.search') }}">
                                        <span class="input-group-btn">
                                            <input style="height: 34px" class="btn btn-default" type="submit" value="">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </form>

                            </div>
                        </li>
                        @include('layouts.menuLogin')
                    </ul>
                </div>
            </div>
        </nav>
        <div id="page-wrapper">
            @if (Session::has('message'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success">
                            <p>{{ Session::get('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @yield('content')
        </div>
    </div>
    <script src="{{ URL::asset('/assets/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/raphael-min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/morris.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/morris-data.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/sb-admin-2.js') }}"></script>
    <script src="{{ URL::asset('/packages/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'editor', {
            filebrowserBrowseUrl : "{{route('files.index',['_token' => csrf_token() ])}}",
            filebrowserImageBrowseUrl : "{{route('files.index',['_token' => csrf_token() ])}}",
            filebrowserFlashBrowseUrl : "{{route('files.index',['_token' => csrf_token() ])}}",
            filebrowserUploadUrl : "{{route('files.upload',['_token' => csrf_token() ])}}",
            filebrowserImageUploadUrl : "{{route('files.upload',['_token' => csrf_token() ])}}",
            filebrowserFlashUploadUrl : "{{route('files.upload',['_token' => csrf_token() ])}}",
        });
        CKEDITOR.replace('solution');
        CKEDITOR.add;
    </script>
</body>
</html>
