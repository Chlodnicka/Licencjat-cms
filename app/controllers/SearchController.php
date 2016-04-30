<?php


/**
 *
 */
class SearchController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $searchQuery = Input::get('searchQuery');
        $exercises = DB::table('exercises')->where('content', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('title', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('solution', 'LIKE', '%' . $searchQuery . '%')
            ->get();

        $courses = DB::table('courses')->where('description', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('name', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('lead', 'LIKE', '%' . $searchQuery . '%')
            ->get();

        $lectures = DB::table('lectures')->where('content', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('title', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('lead', 'LIKE', '%' . $searchQuery . '%')
            ->get();

        $news = DB::table('news')->where('content', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('title', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('lead', 'LIKE', '%' . $searchQuery . '%')
            ->get();

        $this->layout->content = View::make('search.index', array(
            'exercises' => $exercises,
            'courses' => $courses,
            'lectures' => $lectures,
            'news' => $news,
        ));
    }
    
}


?>
