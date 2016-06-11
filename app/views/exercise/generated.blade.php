<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html lang="PL-pl">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>{{ trans('common.homepage') }}</title>
</head>

<body>
<style>
    @font-face {
        font-family: 'DejaVu Sans';
        src: {{ URL::to('/') . 'assets/fonts/DejaVuSans.tff' }};
    }
    body { font-family: 'DejaVu Sans'; }
</style>
    <div>
        {{ $exercises->desc }}
    </div>

    <div class="exercises">
        @foreach( $exercises as $exercise)
        <div class="list-item">
            <h2 class="title">{{ $exercise->title }}</h2>
            <p class="item-lead">{{ $exercise->content }}</p>
        </div>
        <div class="clearfix"></div>
        @endforeach
    </div>
</body>
</html>
