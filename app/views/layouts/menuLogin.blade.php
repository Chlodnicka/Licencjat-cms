<li>
    <a href="{{ URL::route('homepage') }}"><i class="fa fa-dashboard fa-fw"></i> {{ trans('app.dashboard') }}</a>
</li>
<li class="dropdown">
    <a href="#"><i class="fa fa-edit fa-fw"></i> {{ trans('common.edit-content') }}<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse side-item">
        @foreach($tree as $item)
            @if($item->id != 2)
                @if($item->active == 1)
                    <li>{{ HTML::linkRoute($item->name.".index", $item->title, array(), array('class' => 'side-item')) }}</li>
                @else
                    <li>{{ $item->title }}</li>
                @endif
            @endif
        @endforeach
    </ul>
</li>
<li>
    <a href="{{ URL::route('tree.index') }}"><i class="fa fa-sitemap fa-fw"></i> {{ trans('common.content-structure') }}</a>
</li>
<li>
    <a href="{{ URL::route('attachment.index') }}"><i class="fa fa-bar-chart-o fa-fw"></i> {{ trans('common.multimedia') }}</a>
</li>
<li>
    <a href="{{ URL::route('tag.index') }}"><i class="fa fa-bar-chart-o fa-fw"></i> {{ trans('app.tags') }}</a>
</li>
