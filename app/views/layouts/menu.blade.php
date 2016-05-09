<ul>
    @foreach($tree as $item)
        <li>{{ HTML::linkRoute($item->name.".index", $item->name, array(), array()) }}</li>
    @endforeach
</ul>