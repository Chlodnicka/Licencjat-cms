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
        $news_lead = Tree::findOrFail(4);
        $this->layout->content = View::make('news.index', array(
            'news' => $news,
            'news_lead' => $news_lead,
        ));
    }

    public function indexByCourses($id)
    {
        $news = Course::with('news')->find($id)->news;
        $news_lead = Tree::findOrFail(4);
        $this->layout->content = View::make('news.index', array(
            'news' => $news,
            'news_lead' => $news_lead
        ));
    }

    public function edit($id)
    {
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
    }

    public function newOne()
    {
        $courses = Course::all()->lists('name', 'id');
        $tags = Tag::all()->lists('name', 'id');
        $this->layout->content = View::make('news.new', array(
            'courses' => $courses,
            'tags' => $tags
        ));
    }

    public function update($id)
    {
        $news = News::findOrFail($id);
        $news->title = Input::get('title');
        $news->lead = Input::get('lead');
        $news->date = Input::get('date');
        $news->content = Input::get('content');
        $news->course_id = Input::get('courses');
        $news->save();
        $news->tags()->sync(Input::get('tags'));

        return Redirect::route('news.view', $news->id);
    }

    public function create()
    {
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
        $news->tags()->detach();
        $news->delete();

        return Redirect::route('news.index');
    }

}


 ?>
