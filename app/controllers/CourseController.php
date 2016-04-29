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

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $tags = Tag::all()->lists('name','id');
        $this->layout->content = View::make('course.edit', array(
            'course' => $course,
            'tags' => $tags,
        ));
    }

    public function update($id)
    {
        $course = Course::findOrFail($id);
        $course->name = Input::get('name');
        $course->lead = Input::get('lead');
        $course->description = Input::get('description');
        $course->save();
        $course->tags()->sync(Input::get('tags'));

        return Redirect::route('course.view', $course->id);
    }

    public function newOne()
    {
        $tags = Tag::all()->lists('name','id');
        $this->layout->content = View::make('course.new', array(
            'tags' => $tags,
        ));
    }

    public function create()
    {
        $course = new Course();
        $course->name = Input::get('name');
        $course->lead = Input::get('lead');
        $course->description = Input::get('description');
        $course->owner_id = 1;
        $course->owner_role_id = 1;
        $course->save();
        $course->tags()->sync(Input::get('tags'));

        return Redirect::route('course.view', $course->id);
        
    }

    public function view($id)
    {
        $course = Course::findOrFail($id);
        $lectures = Course::find($id)->lectures;
        $tags = Course::find($id)->tags;
        $exercises = Course::find($id)->exercises;
        $this->layout->content = View::make('course.view', array(
            'course' => $course,
            'lectures' => $lectures,
            'exercises' => $exercises,
            'tags' => $tags,
        ));
    }

    public function delete($id)
    {
        $course = Course::findOrFail($id);
        $this->layout->content = View::make('course.delete', array(
            'course' => $course,
        ));
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->lectures()->delete();
        $course->exercises()->delete();
        $course->tags()->detach();
        $course->delete();
        return Redirect::route('course.index');
    }

}
?>
