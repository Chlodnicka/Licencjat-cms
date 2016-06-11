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

    public function __construct()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if($role == 1) {
                $this->layout = 'layouts.masterlogin';
            }
        }
    }

    /**
     * Index search results action.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $searchQuery = Input::get('searchQuery');
        $searchQuery = htmlspecialchars($searchQuery);
        DB::setFetchMode(PDO::FETCH_ASSOC);
        $exercises = DB::table('exercises')->where('content', 'LIKE', '%' . $searchQuery . '%')
            ->select('exercises.id AS id', 'exercises.title AS name', 'exercises.content AS lead')
            ->orWhere('title', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('solution', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('content', 'LIKE', '%' . $searchQuery . '%')
            ->get();

        $courses = DB::table('courses')->where('description', 'LIKE', '%' . $searchQuery . '%')
            ->select('courses.id AS id', 'courses.name AS name', 'courses.lead AS lead')
            ->orWhere('name', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('lead', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('description', 'LIKE', '%' . $searchQuery . '%')
            ->get();

        $lectures = DB::table('lectures')->where('content', 'LIKE', '%' . $searchQuery . '%')
            ->select('lectures.id AS id', 'lectures.title AS name', 'lectures.lead AS lead')
            ->orWhere('title', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('lead', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('content', 'LIKE', '%' . $searchQuery . '%')
            ->get();

        $news = DB::table('news')->where('content', 'LIKE', '%' . $searchQuery . '%')
            ->select('news.id AS id', 'news.title AS name', 'news.lead AS lead')
            ->orWhere('title', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('lead', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('content', 'LIKE', '%' . $searchQuery . '%')
            ->get();
        $i = 0;

        $search_results = array();

        if($courses != NULL) {
            foreach($courses as $course) {
                $search_results[$i] = $course;
                $search_results[$i]['type'] = 'course';
                $search_results[$i]['type_name'] = 'Kursy';
                $i++;
            }
        }

        if($exercises != NULL) {
            foreach($exercises as $exercise) {
                $search_results[$i] = $exercise;
                $search_results[$i]['type'] = 'exercise';
                $search_results[$i]['type_name'] = 'Zadania';
                $i++;
            }
        }
        if($lectures != NULL) {
            foreach($lectures as $lecture) {
                $search_results[$i] = $lecture;
                $search_results[$i]['type'] = 'lecture';
                $search_results[$i]['type_name'] = 'Wykłady';
                $i++;
            }
        }
        if($news != NULL) {
            foreach($news as $news_item) {
                $search_results[$i] = $news_item;
                $search_results[$i]['type'] = 'news';
                $search_results[$i]['type_name'] = 'Aktualności';
                $i++;
            }
        }

        $number_of_items = $i;

        $perPage = 10;
        $currentPage = Input::get('page') - 1;
        $pagedData = array_slice($search_results, $currentPage * $perPage, $perPage);
        $search_results = Paginator::make($pagedData, count($search_results), $perPage);

        $this->layout->content = View::make('search.index', compact('search_results'))->with(array(
            'search_results' => $search_results,
            'number_of_items' => $number_of_items
        ));
    }
    
}


?>
