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
        $lecture_lead = Tree::findOrFail(5);
        $this->layout->content = View::make('lecture.index', array(
            'lectures' => $lectures,
            'lecture_lead' => $lecture_lead
        ));
    }

    public function indexLecturesByCourses($id)
    {
        $lectures = Course::with('lectures')->find($id)->lectures;
        $lecture_lead = Tree::findOrFail(5);
        $this->layout->content = View::make('lecture.index', array(
            'lectures' => $lectures,
            'lecture_lead' => $lecture_lead
        ));
    }

    public function edit($id)
    {
        $lecture = Lecture::findOrFail($id);
        $courses = Course::all()->lists('name', 'id');
        $tags = Tag::all()->lists('name','id');
        $lecture_tags = $lecture->tags()->lists('tag_id');
        $this->layout->content = View::make('lecture.edit', array(
            'lecture' => $lecture,
            'courses' => $courses,
            'tags' => $tags,
            'lecture_tags' => $lecture_tags,
        ));
    }

    public function newOne()
    {
        $courses = Course::all()->lists('name', 'id');
        $tags = Tag::all()->lists('name','id');
        $this->layout->content = View::make('lecture.new', array(
            'courses' => $courses,
            'tags' => $tags,
        ));
    }

    public function update($id)
    {
        $lecture = Lecture::findOrFail($id);
        $lecture->title = Input::get('title');
        $lecture->lead = Input::get('lead');
        $lecture->content = Input::get('content');
        $lecture->course_id = Input::get('courses');
        $lecture->save();
        $lecture->tags()->sync(Input::get('tags'));

        return Redirect::route('lecture.view', $lecture->id);
    }

    public function create()
    {
        $lecture = new Lecture();
        $lecture->title = Input::get('title');
        $lecture->lead = Input::get('lead');
        $lecture->content = Input::get('content');
        $lecture->course_id = Input::get('courses');
        $lecture->owner_id = 1;
        $lecture->owner_role_id = 1;
        $lecture->save();
        $lecture->tags()->sync(Input::get('tags'));

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
        $lecture->tags()->detach();
        $lecture->delete();
        return Redirect::route('lecture.indexCourse', $course_id);
    }

}


 ?>
