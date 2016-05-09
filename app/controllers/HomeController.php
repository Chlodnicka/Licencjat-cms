<?php


class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	protected $layout = 'layouts.master';
	
	public function showMainPage()
	{
		$tree_owner = Tree::findOrFail(1);
		if ( $tree_owner->active == 1) {
			$owner = Owner::findOrFail(1);
		}
		$tree_news = Tree::findOrFail(4);
		if ( $tree_news->active == 1) {
			$news = News::orderby('updated_at', 'desc')->take(3)->get();
		}
		$tree_courses = Tree::findOrFail(3);
		if ( $tree_courses->active == 1) {
			$courses = Course::take(2)->get();
		}
		$this->layout->content = View::make('home', array(
			'courses' => $courses,
			'news' => $news,
			'owner' => $owner,
		));

	}

}
