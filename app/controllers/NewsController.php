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

    public function edit()
    {
        $this->layout->content = View::make('news.edit');
    }

    public function newOne()
    {
        $this->layout->content = View::make('news.new');
    }

    public function create()
    {
        $this->layout->content = View::make('news.create');
    }

    public function view($id)
    {
        $news = News::findOrFail($id);
        $this->layout->content = View::make('news.view',array(
            'news' => $news,
        ));
    }

    public function delete()
    {
        $this->layout->content = View::make('news.delete');
    }

}


 ?>
