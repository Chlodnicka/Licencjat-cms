@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header title">{{ trans('app.dashboard') }}</h1>
        </div>
    </div>
    <ul class="tree">
        @foreach( $tree as $treeItem)
                @if($treeItem->id == 3 )
                    <li><a href="{{ URL::route('tree.'.$treeItem->name, $treeItem->id) }}">{{ $treeItem->title }}</a></li>
                    <ul>
                        <li><a href="{{ URL::route('tree.lecture', 5) }}">{{ trans('app.lectures') }}</a></li>
                        <li><a href="{{ URL::route('tree.exercise', 6) }}">{{ trans('app.exercises') }}</a></li>
                    </ul>
                @elseif($treeItem->id != 5  && $treeItem->id != 6)
                    <li><a href="{{ URL::route('tree.'.$treeItem->name, $treeItem->id) }}">{{ $treeItem->title }}</a></li>
            @endif
        @endforeach
    </ul>
@stop