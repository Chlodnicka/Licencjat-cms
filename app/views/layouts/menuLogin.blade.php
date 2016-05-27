<li>
    <a href="{{ URL::route('homepage') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
</li>
<li>
    <a href="#"><i class="fa fa-edit fa-fw"></i>Edycja treści<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        @foreach($tree as $item)
            @if($item->id != 2)
                @if($item->active == 1)
                    <li>{{ HTML::linkRoute($item->name.".index", $item->title, array(), array()) }}</li>
                @else
                    <li>{{ $item->title }}</li>
                @endif
            @endif
        @endforeach
    </ul>
</li>
<li>
    <a href="{{ URL::route('tree.index') }}"><i class="fa fa-sitemap fa-fw"></i> Struktura treści</a>
</li>
<li>
    <a href="{{ URL::route('attachment.index') }}"><i class="fa fa-bar-chart-o fa-fw"></i>Multimedia i załączniki</a>
</li>
<li>
    <a href="{{ URL::route('tag.index') }}"><i class="fa fa-bar-chart-o fa-fw"></i>Tagi</a>
</li>
