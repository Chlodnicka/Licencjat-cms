@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header title">{{ trans('common.content-structure') }}</h1>
        </div>
    </div>
    <div class="tree">
        <ul id="structure" class="edit-list ">
            @foreach( $tree as $treeItem)
                @if($treeItem->id == 3 )
                    <li>
                        <a href="{{ URL::route('tree.'.$treeItem->name, $treeItem->id) }}">{{ $treeItem->title }}</a>
                        <a href="{{ URL::route('tree.'.$treeItem->name, $treeItem->id) }}">
                            <i class="fa fa-pencil-square-o "></i>
                        </a>
                    </li>
                    <ul>
                        <li>
                            <i class="fa fa-long-arrow-right"></i>
                            <a href="{{ URL::route('tree.lecture', 5) }}">{{ trans('app.lectures') }}</a>
                            <a href="{{ URL::route('tree.'.$treeItem->name, $treeItem->id) }}">
                                <i class="fa fa-pencil-square-o "></i>
                            </a>
                        </li>
                        <li><i class="fa fa-long-arrow-right"></i>
                            <a href="{{ URL::route('tree.exercise', 6) }}">{{ trans('app.exercises') }}</a>
                            <a href="{{ URL::route('tree.'.$treeItem->name, $treeItem->id) }}">
                                <i class="fa fa-pencil-square-o "></i>
                            </a>
                        </li>
                    </ul>
                @elseif($treeItem->id != 5  && $treeItem->id != 6)
                    <li><a href="{{ URL::route('tree.'.$treeItem->name, $treeItem->id) }}">{{ $treeItem->title }}</a>
                        <a href="{{ URL::route('tree.'.$treeItem->name, $treeItem->id) }}">
                            <i class="fa fa-pencil-square-o "></i>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@stop
