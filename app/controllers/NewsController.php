<?php

/**
 *
 */
class NewsController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $this->layout->content = View::make('news.index');
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

    public function view()
    {
        $this->layout->content = View::make('news.view');
    }

    public function delete()
    {
        $this->layout->content = View::make('news.delete');
    }

}


 ?>
