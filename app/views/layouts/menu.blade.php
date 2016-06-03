<ul>
    <?php $number = 0;?>
    @foreach($tree as $item)
        @if($item->active == 1)
           <?php $number++;?>
        @endif
    @endforeach
    @foreach($tree as $item)
        @if($item->active == 1)
            <li style="width: calc(100% / <?php echo $number;?>);">{{ HTML::linkRoute($item->name.".index", $item->title, array(), array()) }}</li>
        @endif
    @endforeach
</ul>