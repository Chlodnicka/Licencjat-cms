<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html lang="PL-pl">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>{{ trans('common.homepage') }}</title>
</head>
<body>
    <h1>{{ trans('app.exercises-generated-with-answers') }}</h1>
    <div class="exercises">
        @foreach( $exercises as $exercise)
        <div class="list-item">
            <h2 class="title">{{ $exercise->title }}</h2>
            <p>{{ trans('common.content') }}</p>
            <p class="item-lead">{{ $exercise->content }}</p>
            <p>{{ trans('common.solution') }}</p>
            <p class="item-lead">{{ $exercise->solution }}</p>
        </div>
        <div class="clearfix"></div>
        @endforeach
    </div>
</body>
</html>
