<?php

/**
 *
 */
class CourseController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $this->layout->content = View::make('course.index');
    }

    public function edit()
    {
        $this->layout->content = View::make('course.edit');
    }

    public function newOne()
    {
        $this->layout->content = View::make('course.new');
    }

    public function create()
    {
        $this->layout->content = View::make('course.create');
    }

    public function view()
    {
        $this->layout->content = View::make('course.view');
    }

    public function delete()
    {
        $this->layout->content = View::make('course.delete');
    }

}


 ?>
