@section('content')
    <h1>Tree! Index</h1>
    <div class="tree">
        @foreach( $tree as $treeItem)
            <div class="tree-item">
                <h2><a href="{{ URL::route('tree.'.$treeItem->name, $treeItem->id) }}">{{ $treeItem->name }}</a></h2>
            </div>
        @endforeach
    </div>
@stop