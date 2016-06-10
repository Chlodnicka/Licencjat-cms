<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html lang="PL-pl">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>@yield('title') {{ trans('common.homepage') }}</title>
    <link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/css/default.min.css') }}" rel="stylesheet">
</head>
<style>
    body {
        max-width: 100%;
        padding: 20px;
    }
    h2 {
        color: #3c3e42;
    }
    div {
        display: inline-block;
        width: calc((100% / 4) - 40px);
        margin: 18px;
        border: 10px solid #eee;
    }
    img {
        max-width:100%;
    }
</style>
        <body class="file-browser">
            <h2>Pliki</h2>
            @foreach($files as $file)
                <div>
                    <a href='{{url('uploads/'.$file["basename"])}}'><img src='{{url('uploads/'.$file['basename'])}}'></a>
                </div>
            @endforeach
            <script src="{{ URL::asset('/assets/js/jquery-2.2.3.min.js') }}"></script>
            <script type="text/javascript">
            $(document).ready(function(){
                $('a[href]').on('click', function(e){
                    e.preventDefault();
                    window.opener.CKEDITOR.tools.callFunction(<?php echo $test; ?>,$(this).find('img').prop('src'));
                    window.close();
                });
            });

            </script>
        </body>
    </html>