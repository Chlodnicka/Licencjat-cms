<?php
/**
 * News controller.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class NewsController.
 *
 * @package Controller
 * @author Maja Chłodnicka
 */
class NewsController extends BaseController
{
    /**
     * @param $layout Base layout
     */
    protected $layout = 'layouts.master';

    /**
     * Index news action.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tree = Tree::findOrFail(4);
        if ( $tree->active == 1) {
            $news = News::paginate(6);
            $news_lead = Tree::findOrFail(4);
            $this->layout->content = View::make('news.index', array(
                'news' => $news,
                'news_lead' => $news_lead,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Index news by courses action.
     *
     * @param $id Id of course
     * @return \Illuminate\View\View
     */
    public function indexByCourses($id)
    {
        $tree = Tree::findOrFail(4);
        if ( $tree->active == 1) {
            $news = DB::table('news')->where('course_id', "=", $id)->paginate(6);
            $news_lead = Tree::findOrFail(4);
            $this->layout->content = View::make('news.index', array(
                'news' => $news,
                'news_lead' => $news_lead
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Edit news item action.
     *
     * @param $id Id of news item
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $tree = Tree::findOrFail(4);
        if ( $tree->active == 1) {
            $news = News::findOrFail($id);
            $courses = Course::all()->lists('name', 'id');
            $tags = Tag::all()->lists('name','id');
            $news_tags = $news->tags()->lists('tag_id');
            $this->layout->content = View::make('news.edit', array(
                'news' => $news,
                'courses' => $courses,
                'tags' => $tags,
                'news_tags' => $news_tags,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * New news item action.
     *
     * @return \Illuminate\View\View
     */
    public function newOne()
    {
        $tree = Tree::findOrFail(4);
        if ( $tree->active == 1) {
            $courses = Course::all()->lists('name', 'id');
            $tags = Tag::all()->lists('name', 'id');
            $this->layout->content = View::make('news.new', array(
                'courses' => $courses,
                'tags' => $tags
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Update news item action.
     *
     * @param $id Id of news item
     * @return \Illuminate\View\View
     */
    public function update($id)
    {
        $tree = Tree::findOrFail(4);
        if ( $tree->active == 1) {
            $news = News::findOrFail($id);
            $news->title = Input::get('title');
            $news->lead = Input::get('lead');
            $news->date = Input::get('date');
            $news->content = Input::get('content');
            $news->course_id = Input::get('courses');
            $news->save();
            $news->tags()->sync(Input::get('tags'));

            $tree_students = Tree::findOrFail(2);
            $action = 'update';
            if( $tree_students->active == 1) {
                $news->sendMail($news->course_id, $action);
            }
            Session::flash('message', Lang::get('app.news-updated'));
            return Redirect::route('news.view', $news->id);
        } else {
            Session::flash('message', Lang::get('common.no-such-site'));
            return Redirect::route('homepage');
        }
    }

    /**
     * Create news item action.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tree = Tree::findOrFail(4);
        if ( $tree->active == 1) {
            $news = new News();
            $news->title = Input::get('title');
            $news->lead = Input::get('lead');
            $news->date = Input::get('date');
            $news->content = Input::get('content');
            $news->course_id = Input::get('courses');
            $news->owner_id = 1;
            $news->owner_role_id = 1;
            $news->save();
            $news->tags()->sync(Input::get('tags'));

            $tree_students = Tree::findOrFail(2);
            $action = 'new';
            if( $tree_students->active == 1) {
                $news->sendMail($news->course_id, $action);
            }
            Session::flash('message', Lang::get('app.news-created'));
            return Redirect::route('news.view', $news->id);
        } else {
            Session::flash('message', Lang::get('common.no-such-site'));
            return Redirect::route('homepage');
        }
    }

    /**
     * View news item action.
     *
     * @param $id Id of news item
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        $tree = Tree::findOrFail(4);
        if ( $tree->active == 1) {
            $news = News::findOrFail($id);
            $this->layout->content = View::make('news.view',array(
                'news' => $news,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Delete news item action.
     *
     * @param $id Id of news item
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        $tree = Tree::findOrFail(4);
        if ( $tree->active == 1) {
            $news = News::findOrFail($id);
            $this->layout->content = View::make('news.delete', array(
                'news' => $news,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Destroy news item action.
     *
     * @param $id Id of news item
     * @return \Illuminate\View\View
     */
    public function destroy($id)
    {
        $tree = Tree::findOrFail(4);
        if ( $tree->active == 1) {
            $news = News::findOrFail($id);
            $news->tags()->detach();
            $news->delete();
            Session::flash('message', Lang::get('app.news-destroyed'));
            return Redirect::route('news.index');
        } else {
            Session::flash('message', Lang::get('common.no-such-site'));
            return Redirect::route('homepage');
        }
    }

}


 ?>
