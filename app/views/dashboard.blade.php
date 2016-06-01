@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header title">{{ trans('app.dashboard') }}</h1>
        </div>
    </div>
    <div class="row panel-default">
        <div class="col-lg-9">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#structure" data-toggle="tab">{{ trans('common.content-structure') }}</a> </li>
                <li><a href="#content" data-toggle="tab">{{ trans('common.edit-content') }}</a> </li>
            </ul>
            <div class="tab-content">
                <ul id="structure" class="edit-list tab-pane fade in active">
                    <h2>{{ trans('common.content-structure') }}</h2>
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
                <ul id="content" class="edit-list tab-pane fade">
                    <h2>{{ trans('common.edit-content') }}</h2>
                    @foreach($tree as $item)
                        @if($item->id != 2)
                            @if($item->active == 1)
                                <li>
                                    <a href="{{ URL::route($item->name.".index") }}">{{ $item->title }}</a>
                                    <a href="{{ URL::route($item->name.".index") }}">
                                        <i class="fa fa-pencil-square-o "></i>
                                    </a>
                                </li>
                            @else
                                <li>{{ $item->title }}</li>
                            @endif
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@stop