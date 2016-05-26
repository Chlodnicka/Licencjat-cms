<ul>
    @foreach($tree as $item)
        @if($item->active == 1)
            <li>{{ HTML::linkRoute($item->name.".index", $item->title, array(), array()) }}</li>
        @endif
    @endforeach
</ul>