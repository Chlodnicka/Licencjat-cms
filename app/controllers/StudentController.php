<?php


/**
 *
 */
class StudentController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $this->layout->content = View::make('student.index');
    }

    public function edit()
    {
        $this->layout->content = View::make('student.edit');
    }

    public function newOne()
    {
        $this->layout->content = View::make('student.new');
    }

    public function create()
    {
        $this->layout->content = View::make('student.create');
    }

    public function view()
    {
        $this->layout->content = View::make('student.view');
    }

    public function delete()
    {
        $this->layout->content = View::make('student.delete');
    }

}


 ?>
