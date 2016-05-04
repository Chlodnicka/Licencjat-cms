<?php


/**
 *
 */
class StudentController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $tree = Tree::findOrFail(2);
        if ( $tree->active == 1 ) {
            $students = Student::all();
            $course = new Course;
            $course->name = "Wszystkie kursy";
            $this->layout->content = View::make('student.index', array(
                'students' => $students,
                'course' => $course,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    public function indexByCourses($id)
    {
        $tree = Tree::findOrFail(2);
        if ( $tree->active == 1 ) {
            $students = Course::with('students')->find($id)->students;
            $course = Course::findOrFail($id);
            $this->layout->content = View::make('student.index', array(
                'students' => $students,
                'course' => $course,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    public function edit($id)
    {
        $tree = Tree::findOrFail(2);
        if ( $tree->active == 1 ) {
            $student = Student::findOrFail($id);
            $this->layout->content = View::make('student.edit', array(
                'student' => $student
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    public function newOne()
    {
        $tree = Tree::findOrFail(2);
        if ( $tree->active == 1 ) {
            $courses = Course::all()->lists('name', 'id');
            $students_lead = Tree::findOrFail(2);
            $this->layout->content = View::make('student.new', array(
                'courses' => $courses,
                'students_lead' => $students_lead,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    public function update($id)
    {
        $tree = Tree::findOrFail(2);
        if ( $tree->active == 1 ) {
            $student = Student::findOrFail($id);
            $student->firstname = Input::get('firstname');
            $student->lastname = Input::get('lastname');
            $student->email = Input::get('email');
            $student->course_id = Input::get('courses');
            $student->save();
            Session::flash('message', 'OK');
            return Redirect::route('course.view', $student->course_id);
        } else {
            return Redirect::route('homepage');
        }
    }

    public function create()
    {
        $tree = Tree::findOrFail(2);
        if ( $tree->active == 1 ) {
            $student = new Student();
            $student->firstname = Input::get('firstname');
            $student->lastname = Input::get('lastname');
            $student->email = Input::get('email');
            $student->course_id = Input::get('courses');
            $student->role_id = 3;
            $student->owner_id = 1;
            $student->owner_role_id = 1;
            $student->save();
            Session::flash('message', 'OK');
            return Redirect::route('course.view', $student->course_id);
        } else {
            return Redirect::route('homepage');
        }
    }

    public function view($id)
    {
        $tree = Tree::findOrFail(2);
        if ( $tree->active == 1 ) {
            $student = Student::findOrFail($id);
            $this->layout->content = View::make('student.view', array(
                'student' => $student,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    public function delete($id)
    {
        $tree = Tree::findOrFail(2);
        if ( $tree->active == 1 ) {
            $student = Student::findOrFail($id);
            $this->layout->content = View::make('student.delete', array(
                'student' => $student,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    public function destroy($id)
    {
        $tree = Tree::findOrFail(2);
        if ( $tree->active == 1 ) {
            $student= Student::findOrFail($id);
            $student->delete();

            // redirect
            Session::flash('message', 'OK');
            return Redirect::route('student.index');
        } else {
            return Redirect::route('homepage');
        }
    }

}


 ?>
