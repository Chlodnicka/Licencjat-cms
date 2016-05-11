<?php
/**
 * Student controller.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class StudentController.
 *
 * @package Controller
 * @author Maja Chłodnicka
 */
class StudentController extends BaseController
{
    /**
     * @param $layout Base layout
     */
    protected $layout = 'layouts.master';

    /**
     * Index students action.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tree = Tree::findOrFail(2);
        if ( $tree->active == 1 ) {
            $students = Student::paginate(10);
            $course = new Course;
            $course->name = Lang::get('app.all-courses');
            $this->layout->content = View::make('student.index', array(
                'students' => $students,
                'course' => $course,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Index students by courses action.
     *
     * @param $id Id of course
     * @return \Illuminate\View\View
     */
    public function indexByCourses($id)
    {
        $tree = Tree::findOrFail(2);
        if ( $tree->active == 1 ) {
            $students = DB::table('students')->where('course')->paginate(10);
            $course = Course::findOrFail($id);
            $this->layout->content = View::make('student.index', array(
                'students' => $students,
                'course' => $course,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Edit student action.
     *
     * @param $id Id of student
     * @return \Illuminate\View\View
     */
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

    /**
     * New student action.
     *
     * @return \Illuminate\View\View
     */
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

    /**
     * Update student action.
     *
     * @param $id Id of student
     * @return \Illuminate\View\View
     */
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
            Session::flash('message', Lang::get('app.student-updated'));
            return Redirect::route('course.view', $student->course_id);
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Create student action.
     *
     * @return \Illuminate\View\View
     */
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
            Session::flash('message', Lang::get('app.student-created'));
            return Redirect::route('course.view', $student->course_id);
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * View student action.
     *
     * @param $id Id of student
     * @return \Illuminate\View\View
     */
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

    /**
     * Delete student action.
     *
     * @param $id Id of student
     * @return \Illuminate\View\View
     */
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

    /**
     * Destroy student action.
     *
     * @param $id Id of student
     * @return \Illuminate\View\View
     */
    public function destroy($id)
    {
        $tree = Tree::findOrFail(2);
        if ( $tree->active == 1 ) {
            $student= Student::findOrFail($id);
            $student->delete();

            // redirect
            Session::flash('message', Lang::get('app.student-destroyed'));
            return Redirect::route('student.index');
        } else {
            return Redirect::route('homepage');
        }
    }

}


 ?>
