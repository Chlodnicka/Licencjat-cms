<?php

/**
 *
 */
class LectureController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $this->layout->content = View::make('lecture.index');
    }

    public function edit()
    {
        $this->layout->content = View::make('lecture.edit');
    }

    public function newOne()
    {
        $this->layout->content = View::make('lecture.new');
    }

    public function create()
    {
        $this->layout->content = View::make('lecture.create');
    }

    public function view()
    {
        $this->layout->content = View::make('lecture.view');
    }

    public function delete()
    {
        $this->layout->content = View::make('lecture.delete');
    }

}


 ?>
