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

    public function __construct()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if($role == 1) {
                $this->layout = 'layouts.masterlogin';
            }
        }
    }

    /**
     * Index students action.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tree = Tree::findOrFail(2);
        if ( $tree->active == 1 ) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $students = Student::paginate(10);
                    $course = new Course;
                    $course->name = Lang::get('app.all-courses');
                    $this->layout->content = View::make('student.index', array(
                        'students' => $students,
                        'course' => $course,
                    ));
                } else {
                    $student = DB::table('students')->where('users_id', '=', $userId)->get();
                    return Redirect::route('student.view', $student[0]->id);
                }
            } else {
                return Redirect::route('homepage');
            }
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
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $students = DB::table('students')->where('course')->paginate(10);
                    $course = Course::findOrFail($id);
                    $this->layout->content = View::make('student.index', array(
                        'students' => $students,
                        'course' => $course,
                    ));
                } else {
                    $student = DB::table('students')->where('users_id', '=', $userId)->get();
                    return Redirect::route('student.view', $student[0]->id);
                }
            } else {
                return Redirect::route('homepage');
            }
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
            if (Auth::check()) {
                $userId = Auth::id();
                $student = DB::table('students')->where('users_id', '=', $userId)->get();
                if($student[0]->id == $id) {
                    $student = Student::findOrFail($id);
                    $courses = Course::all()->lists('name', 'id');
                    $student_courses = $student->course()->lists('course_id');
                    $this->layout->content = View::make('student.edit', array(
                        'student' => $student,
                        'courses' => $courses,
                        'student_courses' => $student_courses,
                    ));
                } else {
                    return Redirect::route('homepage');
                }
            } else {
                return Redirect::route('homepage');
            }
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
            if (Auth::check()) {
                $userId = Auth::id();
                $student = DB::table('students')->where('users_id', '=', $userId)->get();
                if($student[0]->id == $id) {
                    $student = Student::findOrFail($id);
                    $student->firstname = Input::get('firstname');
                    $student->lastname = Input::get('lastname');
                    $student->email = Input::get('email');

                    $rules = $student->rules();
                    $validator = Validator::make(Input::all(), $rules);

                    if ($validator->fails()) {
                        return Redirect::route('student.edit', $student->id)
                            ->withErrors($validator);
                    } else {
                        $student->save();
                        if(Input::get('courses') != NULL){
                            $student->course()->sync(Input::get('courses'));
                        }
                        Session::flash('message', Lang::get('app.student-updated'));
                        return Redirect::route('student.view', $student->id);
                    }
                } else {
                    return Redirect::route('homepage');
                }
            } else {
                return Redirect::route('homapage');
            }
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
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $student = DB::table('students')->where('users_id', '=', $userId)->get();
                if( $user->role_id == 1 || $student[0]->id == $id ) {
                    $students = Student::findOrFail($id);
                    $student_courses = $students->course()->get();
                    $this->layout->content = View::make('student.view', array(
                        'students' => $students,
                        'student_courses' => $student_courses,
                    ));
                } else {
                    return Redirect::route('homepage');
                }
            } else {
                return Redirect::route('homepage');
            }

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
            if (Auth::check()) {
                $userId = Auth::id();
                $student = DB::table('students')->where('users_id', '=', $userId)->get();
                if($student[0]->id == $id ){
                    $student = Student::findOrFail($id);
                    $this->layout->content = View::make('student.delete', array(
                        'student' => $student,
                    ));
                } else {
                    return Redirect::route('homepage');
                }
            } else {
                return Redirect::route('homepage');
            }

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
            if (Auth::check()) {
                $userId = Auth::id();
                $student = DB::table('students')->where('users_id', '=', $userId)->get();
                if($student[0]->id == $id ) {
                    $student= Student::findOrFail($id);
                    $student->course()->detach();
                    $student->delete();

                    // redirect
                    Session::flash('message', Lang::get('app.student-destroyed'));
                    return Redirect::route('student.index');
                } else {
                    return Redirect::route('homepage');
                }
            } else {
                return Redirect::route('homepage');
            }
        } else {
            return Redirect::route('homepage');
        }
    }

}


 ?>
