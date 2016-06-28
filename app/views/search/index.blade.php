
@section('content')

    <div class="search list">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header title">{{ trans('app.search-results') }}</h1>
            </div>
        </div>
        <div class="search-list">
            @if($number_of_items != 0)
                @foreach($search_results as $search_result)
                    @if(!empty($search_result['type']))
                        <div class="list-item">
                            <p style="margin-top: 20px">{{ $search_result['type_name'] }}</p>
                            <h2 class="title">{{ $search_result['name'] }}</h2>
                            <p class="item-lead">{{ $search_result['lead'] }}</p>
                            <a class="btn btn-default" href="{{ URL::route($search_result['type'].'.view', $search_result['id']) }}">{{ trans('common.see-more') }}</a>
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
