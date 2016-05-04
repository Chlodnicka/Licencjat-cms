<?php


/**
 *
 */
class NewsController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $tree = Tree::findOrFail(4);
        if ( $tree->active == 1) {
            $news = News::all();
            $news_lead = Tree::findOrFail(4);
            $this->layout->content = View::make('news.index', array(
                'news' => $news,
                'news_lead' => $news_lead,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    public function indexByCourses($id)
    {
        $tree = Tree::findOrFail(4);
        if ( $tree->active == 1) {
            $news = Course::with('news')->find($id)->news;
            $news_lead = Tree::findOrFail(4);
            $this->layout->content = View::make('news.index', array(
                'news' => $news,
                'news_lead' => $news_lead
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

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
            Session::flash('message', 'OK');
            return Redirect::route('news.view', $news->id);
        } else {
            return Redirect::route('homepage');
        }
    }

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
            Session::flash('message', 'OK');
            return Redirect::route('news.view', $news->id);
        } else {
            return Redirect::route('homepage');
        }
    }

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

    public function destroy($id)
    {
        $tree = Tree::findOrFail(4);
        if ( $tree->active == 1) {
            $news = News::findOrFail($id);
            $news->tags()->detach();
            $news->delete();
            Session::flash('message', 'OK');
            return Redirect::route('news.index');
        } else {
            return Redirect::route('homepage');
        }
    }

}


 ?>
