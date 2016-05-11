<?php
/**
 * Search controller.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class SearchController.
 *
 * @package Controller
 * @author Maja Chłodnicka
 */
class SearchController extends BaseController
{
    /**
     * @param $layout Base layout
     */
    protected $layout = 'layouts.master';

    /**
     * Index search results action.
     *
     * @return \Illuminate\View\View
     */
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
