<?php


/**
 *
 */
class StudentController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $students = Student::all();
        $course = new Course;
        $course->name = "Wszystkie kursy";
        $this->layout->content = View::make('student.index', array(
            'students' => $students,
            'course' => $course,
        ));
    }

    public function indexByCourses($id)
    {
        $students = Course::with('students')->find($id)->students;
        $course = Course::findOrFail($id);
        $this->layout->content = View::make('student.index', array(
            'students' => $students,
            'course' => $course,
        ));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $this->layout->content = View::make('student.edit', array(
            'student' => $student
        ));
    }

    public function newOne()
    {
        $courses = Course::all()->lists('name', 'id');
        $students_lead = Tree::findOrFail(2);
        $this->layout->content = View::make('student.new', array(
            'courses' => $courses,
            'students_lead' => $students_lead,
        ));
    }

    public function update($id)
    {
        $student = Student::findOrFail($id);
        $student->firstname = Input::get('firstname');
        $student->lastname = Input::get('lastname');
        $student->email = Input::get('email');
        $student->course_id = Input::get('courses');
        $student->save();

        return Redirect::route('course.view', $student->course_id);
    }

    public function create()
    {
        $student = new Student();
        $student->firstname = Input::get('firstname');
        $student->lastname = Input::get('lastname');
        $student->email = Input::get('email');
        $student->course_id = Input::get('courses');
        $student->role_id = 3;
        $student->owner_id = 1;
        $student->owner_role_id = 1;
        $student->save();

        return Redirect::route('course.view', $student->course_id);
    }

    public function view($id)
    {
        $student = Student::findOrFail($id);
        $this->layout->content = View::make('student.view', array(
            'student' => $student,
        ));
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $this->layout->content = View::make('student.delete', array(
            'student' => $student,
        ));
    }

    public function destroy($id)
    {
        $student= Student::findOrFail($id);
        $student->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        return Redirect::route('student.index');
    }

}


 ?>
