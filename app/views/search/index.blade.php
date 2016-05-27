
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header title">{{ trans('app.search-results') }}</h1>
        </div>
    </div>
    <div class="search list">
        <div class="search-list">
            @if($number_of_items != 0)
                @foreach($search_results as $search_result)
                    @if(!empty($search_result['type']))
                        <div class="list-item">
                            <span>{{ $search_result['type'] }}</span>
                            <h2 class="title">{{ $search_result['name'] }}</h2>
                            <p class="item-lead">{{ $search_result['lead'] }}</p>
                            <a href="{{ URL::route($search_result['type'].'.view', $search_result['id']) }}">{{ trans('common.see-more') }}</a>
                        </div>
                        <div class="clearfix"></div>
                    @endif
                @endforeach
            @else
                <p>Brak wyników wyszukiwania</p>
            @endif
            <?php echo $search_results->links(); ?>
        </div>
    </div>
@stop
