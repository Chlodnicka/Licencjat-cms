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

    public function edit($id)
    {
        $lecture = Lecture::findOrFail($id);
        $this->layout->content = View::make('lecture.edit', array(
            'lecture' => $lecture,
        ));
    }

    public function newOne()
    {
        $this->layout->content = View::make('lecture.new');
    }

    public function update($id)
    {
        $lecture = Lecture::findOrFail($id);
        $lecture->title = Input::get('title');
        $lecture->lead = Input::get('lead');
        $lecture->content = Input::get('content');
        $lecture->course_id = Input::get('course');
        $lecture->save();

        return Redirect::route('lecture.view', $lecture->id);
    }

    public function create()
    {
        $lecture = new Lecture();
        $lecture->title = Input::get('title');
        $lecture->lead = Input::get('lead');
        $lecture->content = Input::get('content');
        $lecture->course_id = Input::get('course');
        $lecture->owner_id = 1;
        $lecture->owner_role_id = 1;
        $lecture->save();

        return Redirect::route('lecture.view', $lecture->id);
    }

    public function view($id)
    {
        $lecture = Lecture::findOrFail($id);
        $this->layout->content = View::make('lecture.view', array(
            'lecture' => $lecture,
        ));
    }

    public function delete($id)
    {
        $lecture = Lecture::findOrFail($id);
        $this->layout->content = View::make('lecture.delete', array(
            'lecture' => $lecture,
        ));
    }

    public function destroy($id)
    {
        $lecture = Lecture::findOrFail($id);
        $course_id = $lecture->course->id;
        $lecture->delete();
        return Redirect::route('lecture.indexCourse', $course_id);
    }

}


 ?>
