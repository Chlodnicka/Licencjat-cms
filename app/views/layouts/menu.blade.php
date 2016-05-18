<ul>
    @foreach($tree as $item)
        <li>{{ HTML::linkRoute($item->name.".index", $item->title, array(), array()) }}</li>
    @endforeach
</ul>