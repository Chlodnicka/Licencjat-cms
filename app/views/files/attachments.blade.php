@section('content')
    <style>
        .attach-title {
            color: #3c3e42;
        }
        .image {
            display: inline-block;
            width: calc((100% / 4) - 40px);
            margin: 18px;
            vertical-align: middle;
            border: 10px solid #eee;
            position: relative;
        }
        .image p {
            position: absolute;
            bottom: 0;
            color: #fff;
            max-width: 100%;
            white-space: pre-wrap;      /* CSS3 */
            white-space: -moz-pre-wrap; /* Firefox */
            white-space: -pre-wrap;     /* Opera <7 */
            white-space: -o-pre-wrap;   /* Opera 7 */
            word-wrap: break-word;      /* IE */
        }
        .image img {
            max-width:100%;
        }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="attach-title">Pliki</h2>
        </div>
    </div>
    @foreach($files as $file)
        <?php $comma = strpos($file["basename"], '.'); $extension = substr($file["basename"], $comma + 1); ?>
        @if($extension == 'jpg' || $extension == 'png' || $extension == 'gif' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'GIF' || $extension == 'JPEG')
            <div class="image">
                <a href='{{url('uploads/'.$file["basename"])}}'><img src='{{url('uploads/'.$file['basename'])}}'></a>
            </div>
        @else
            <div class="image">
                <a href='{{url('uploads/'.$file["basename"])}}'><img src='{{url('assets/img/pdf.png')}}'><p>{{ $file["basename"] }}</p></a>
            </div>
        @endif
    @endforeach
@stop