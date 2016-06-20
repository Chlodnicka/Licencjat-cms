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
    body { font-family: 'DejaVu Sans', serif; }
    span, p {
        display: inline;
    }
    .item-lead {
        display: block;
    }
    img {
        max-width:80%;
        height: auto;
        display: block;
        float: none;
    }
</style>
    <div>
        {{ $desc }}
    </div>

    <div class="exercises">
        <?php $i = 1;?>
        @foreach( $exercises as $exercise)
        <div class="list-item">
            <p class="item-lead"><span><?php echo $i;?>. </span><span>{{ $exercise->content }}</span></p>
        </div>
            <?php $i++;?>
        @endforeach
    </div>
</body>
</html>
