<?php


/**
 *
 */
class CourseController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $courses = Course::all();
        $this->layout->content = View::make('course.index', array('courses' => $courses));
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

    public function view($id)
    {
        $course = Course::findOrFail($id);
        $lectures = Course::find($id)->lectures;
        $this->layout->content = View::make('course.view', array(
            'course' => $course,
            'lectures' => $lectures
        ));
    }

    public function delete()
    {
        $this->layout->content = View::make('course.delete');
    }

}


 ?>
