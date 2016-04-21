<?php


/**
 *
 */
class NewsController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $news = News::all();
        $this->layout->content = View::make('news.index', array('news' => $news));
    }

    public function indexByCourses($id)
    {
        $news = Course::with('news')->find($id)->news;
        $this->layout->content = View::make('news.index', array(
            'news' => $news
        ));
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        $this->layout->content = View::make('news.edit', array(
            'news' => $news
        ));
    }

    public function newOne()
    {
        $this->layout->content = View::make('news.new');
    }

    public function update($id)
    {
        $news = News::findOrFail($id);
        $news->title = Input::get('title');
        $news->lead = Input::get('lead');
        $news->date = Input::get('date');
        $news->content = Input::get('content');
        $news->course_id = Input::get('course');
        $news->save();

        return Redirect::route('news.view', $news->id);
    }

    public function create()
    {
        $news = new News();
        $news->title = Input::get('title');
        $news->lead = Input::get('lead');
        $news->date = Input::get('date');
        $news->content = Input::get('content');
        $news->course_id = Input::get('course');
        $news->owner_id = 1;
        $news->owner_role_id = 1;
        $news->save();

        return Redirect::route('news.view', $news->id);
    }

    public function view($id)
    {
        $news = News::findOrFail($id);
        $this->layout->content = View::make('news.view',array(
            'news' => $news,
        ));
    }

    public function delete($id)
    {
        $news = News::findOrFail($id);
        $this->layout->content = View::make('news.delete', array(
            'news' => $news,
        ));
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return Redirect::route('news.index');
    }

}


 ?>
