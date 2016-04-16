<?php

/**
 *
 */
class TagController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $this->layout->content = View::make('tag.index');
    }

    public function edit()
    {
        $this->layout->content = View::make('tag.edit');
    }

    public function newOne()
    {
        $this->layout->content = View::make('tag.new');
    }

    public function create()
    {
        $this->layout->content = View::make('tag.create');
    }

    public function view()
    {
        $this->layout->content = View::make('tag.view');
    }

    public function delete()
    {
        $this->layout->content = View::make('tag.delete');
    }

}


 ?>
