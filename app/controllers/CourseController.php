<?php


/**
 *
 */
class CourseController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $tree = Tree::findOrFail(3);
        if ( $tree->active == 1) {
            $courses = Course::all();
            $courses_lead = Tree::findOrFail(3);
            $this->layout->content = View::make('course.index', array(
                'courses' => $courses,
                'courses_lead' => $courses_lead,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    public function edit($id)
    {
        $tree = Tree::findOrFail(3);
        if ( $tree->active == 1) {
            $course = Course::findOrFail($id);
            $courses_lead = Tree::findOrFail(3);
            $tags = Tag::all()->lists('name', 'id');
            $this->layout->content = View::make('course.edit', array(
                'course' => $course,
                'tags' => $tags,
                'courses_lead' => $courses_lead,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    public function update($id)
    {
        $tree = Tree::findOrFail(3);
        if ( $tree->active == 1) {
            $course = Course::findOrFail($id);
            $course->name = Input::get('name');
            $course->lead = Input::get('lead');
            $course->description = Input::get('description');
            $course->save();
            $course->tags()->sync(Input::get('tags'));
            $tree_students = Tree::findOrFail(2);
            if ( $tree_students->active == 1) {
                $course->sendMail($id);
            }
            return Redirect::route('course.view', $course->id);
        } else {
            return Redirect::route('homepage');
        }
    }

    public function newOne()
    {
        $tree = Tree::findOrFail(3);
        if ( $tree->active == 1) {
            $tags = Tag::all()->lists('name','id');
            $this->layout->content = View::make('course.new', array(
                'tags' => $tags,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    public function create()
    {
        $tree = Tree::findOrFail(3);
        if ( $tree->active == 1) {
            $course = new Course();
            $course->name = Input::get('name');
            $course->lead = Input::get('lead');
            $course->description = Input::get('description');
            $course->owner_id = 1;
            $course->owner_role_id = 1;
            $course->save();
            $course->tags()->sync(Input::get('tags'));

            return Redirect::route('course.view', $course->id);
        } else {
            return Redirect::route('homepage');
        }
    }

    public function view($id)
    {
        $tree = Tree::findOrFail(3);
        if ( $tree->active == 1) {
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
        } else {
            return Redirect::route('homepage');
        }
    }

    public function delete($id)
    {
        $tree = Tree::findOrFail(3);
        if ( $tree->active == 1) {
            $course = Course::findOrFail($id);
            $this->layout->content = View::make('course.delete', array(
                'course' => $course,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    public function destroy($id)
    {
        $tree = Tree::findOrFail(3);
        if ( $tree->active == 1) {
            $course = Course::findOrFail($id);
            $course->lectures()->delete();
            $course->exercises()->delete();
            $course->students()->delete();
            $course->tags()->detach();
            $course->delete();
            return Redirect::route('course.index');
        } else {
            return Redirect::route('homepage');
        }
    }
    
}
?>
