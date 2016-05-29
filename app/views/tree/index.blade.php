@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header title">{{ trans('common.content-structure') }}</h1>
        </div>
    </div>
    <div class="tree">
        @foreach( $tree as $treeItem)
            @if($treeItem->name != 'lectures' || $treeItem->name != 'exercises')
                @if($treeItem->name == 'courses' )
                    <li><a href="{{ URL::route('tree.'.$treeItem->name, $treeItem->id) }}">{{ $treeItem->title }}</a></li>
                    <ul>
                        <li><a href="{{ URL::route('tree.lectures', 5) }}">{{ trans('app.lectures') }}</a></li>
                        <li><a href="{{ URL::route('tree.exercise', 6) }}">{{ trans('app.exercise') }}</a></li>
                    </ul>
                @else
                    <li><a href="{{ URL::route('tree.'.$treeItem->name, $treeItem->id) }}">{{ $treeItem->title }}</a></li>
                @endif
            @endif
        @endforeach
    </div>
@stop
