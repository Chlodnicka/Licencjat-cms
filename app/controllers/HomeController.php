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
	
	public function showMainPage()
	{
		if (Auth::check()) {
			$userId = Auth::id();
			$user = User::findOrFail($userId);
			$role = $user->role_id;
			if ($role == 1) {
				$tree = Tree::menuLogged();
				$this->layout->content = View::make('dashboard', array(
					'tree' => $tree,
				));
			} else{
				$tree_owner = Tree::findOrFail(1);
				if ( $tree_owner->active == 1) {
					$owner = Owner::findOrFail(1);
					$positions = $owner->position();
					$position = $positions[$owner->position];
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
					'position' => $position,
				));
			}
		} else {
			$tree_owner = Tree::findOrFail(1);
			if ( $tree_owner->active == 1) {
				$owner = Owner::findOrFail(1);
				$positions = $owner->position();
				$position = $positions[$owner->position];
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
				'position' => $position,
			));
		}
	}

	public function showMainPageLogged()
	{
		if (Auth::check()) {
			$userId = Auth::id();
			$user = User::findOrFail($userId);
			$role = $user->role_id;
			if ($role == 1) {
				$this->layout = 'layouts.masterlogin';
				$tree = Tree::menuLogged();
				$this->layout->content = View::make('dashboard', array(
					'tree' => $tree,
				));
			} else {
				Redirect::route('homepage');
			}
		} else {
			Redirect::route('homepage');
		}
	}

}
