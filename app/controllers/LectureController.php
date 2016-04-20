<?php


/**
 *
 */
class LectureController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $lectures = Lecture::all();
        $this->layout->content = View::make('lecture.index', array(
            'lectures' => $lectures
        ));
    }

    public function indexLecturesByCourses($id)
    {
        $lectures = Course::with('lectures')->find($id)->lectures;
        $this->layout->content = View::make('lecture.index', array(
            'lectures' => $lectures
        ));
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

    public function view($id)
    {
        $lecture = Lecture::findOrFail($id);
        $this->layout->content = View::make('lecture.view', array(
            'lecture' => $lecture,
        ));
    }

    public function delete()
    {
        $this->layout->content = View::make('lecture.delete');
    }

}


 ?>
