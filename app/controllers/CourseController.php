<?php
/**
 * Course controller.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class CourseController.
 *
 * @package Controller
 * @author Maja Chłodnicka
 */

class CourseController extends BaseController
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
     * Index courses action.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tree = Tree::findOrFail(3);
        if ( $tree->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $actions = 1;
                } else {
                    $actions = 0;
                }
            } else {
                $actions = 0;
            }
            $courses = Course::paginate(3);
            $courses_lead = Tree::findOrFail(3);
            $this->layout->content = View::make('course.index', array(
                'courses' => $courses,
                'courses_lead' => $courses_lead,
                'actions' => $actions,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Edit course action.
     *
     * @param $id Id of course
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $tree = Tree::findOrFail(3);
        if ( $tree->active == 1) {

            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $course = Course::findOrFail($id);
                    $courses_lead = Tree::findOrFail(3);
                    $course_tags = $course->tags()->lists('tag_id');
                    $tags = Tag::all()->lists('name', 'id');
                    $this->layout->content = View::make('course.edit', array(
                        'course' => $course,
                        'tags' => $tags,
                        'courses_lead' => $courses_lead,
                        'course_tags' => $course_tags,
                    ));
                } else {
                    return Redirect::route('course.view', $id);
                }
            } else {
                return Redirect::route('course.view', $id);
            }

        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Update course action.
     *
     * @param $id Id of course
     * @return \Illuminate\View\View
     */
    public function update($id)
    {
        $tree = Tree::findOrFail(3);
        if ( $tree->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $course = Course::findOrFail($id);
                    $course->name = Input::get('name');
                    $course->lead = Input::get('lead');
                    $course->description = Input::get('description');

                    $rules = $course->rules();
                    $validator = Validator::make(Input::all(), $rules);

                    if ($validator->fails())
                    {
                        return Redirect::route('course.edit', $course->id)
                            ->withErrors($validator);
                    } else {
                        $course->save();
                        if(Input::get('tags') != NULL){
                            $course->tags()->sync(Input::get('tags'));
                        }
                        $tree_students = Tree::findOrFail(2);
                        if ( $tree_students->active == 1) {
                            $course->sendMail($id);
                        }
                        Session::flash('message', Lang::get('app.course-updated'));
                        return Redirect::route('course.view', $course->id);
                    }
                } else {
                    return Redirect::route('course.view', $id);
                }
            } else {
                return Redirect::route('course.view', $id);
            }

        } else {
            Session::flash('message', Lang::get('common.no-such-site'));
            return Redirect::route('homepage');
        }
    }

    /**
     * New course action.
     *
     * @return \Illuminate\View\View
     */
    public function newOne()
    {
        $tree = Tree::findOrFail(3);
        if ( $tree->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $tags = Tag::all()->lists('name','id');
                    $this->layout->content = View::make('course.new', array(
                        'tags' => $tags,
                    ));
                } else {
                    return Redirect::route('course.index');
                }
            } else {
                return Redirect::route('course.index');
            }
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Create course action.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tree = Tree::findOrFail(3);
        if ( $tree->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $course = new Course();
                    $course->name = Input::get('name');
                    $course->lead = Input::get('lead');
                    $course->description = Input::get('description');
                    $course->owner_id = 1;
                    $course->owner_role_id = 1;

                    $rules = $course->rules();
                    $validator = Validator::make(Input::all(), $rules);

                    if ($validator->fails())
                    {
                        return Redirect::route('course.new')
                            ->withErrors($validator)
                            ->withInput();
                    } else {
                        $course->save();
                        if(Input::get('tags') != NULL){
                            $course->tags()->sync(Input::get('tags'));
                        }
                        Session::flash('message', Lang::get('app.course-created'));
                        return Redirect::route('course.index');
                    }
                } else {
                    return Redirect::route('course.index');
                }
            } else {
                return Redirect::route('course.index');
            }

        } else {
            Session::flash('message', Lang::get('common.no-such-site'));
            return Redirect::route('homepage');
        }
    }

    /**
     * View course action.
     *
     * @param $id Id of course
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        $tree = Tree::findOrFail(3);
        if ( $tree->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $actions = 1;
                } else {
                    $actions = 0;
                }
            } else {
                $actions = 0;
            }
            $course = Course::findOrFail($id);
            $lectures = Course::find($id)->lectures->take(5);
            $tags = Course::find($id)->tags;
            $exercises = Course::find($id)->exercises->take(5);
            $exercise_tags = DB::table('exercise_tag')->select('tags.name', 'tags.id')->join('exercises', 'exercises.id', '=', 'exercise_tag.exercise_id')->join('tags', 'tags.id', '=', 'exercise_tag.tag_id')->where('course_id', '=', $id)->distinct()->get();
            $exercise_lectures = DB::table('exercises')->select('lectures.title', 'lectures.id')->join('lectures', 'exercises.lecture_id', '=', 'lectures.id')->where('exercises.course_id', '=', $id)->distinct()->get();
            $this->layout->content = View::make('course.view', array(
                'course' => $course,
                'lectures' => $lectures,
                'exercises' => $exercises,
                'tags' => $tags,
                'actions' => $actions,
                'exercises_lectures' => $exercise_lectures,
                'exercises_tags' => $exercise_tags,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Delete course action.
     *
     * @param $id Id of course
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        $tree = Tree::findOrFail(3);
        if ( $tree->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $course = Course::findOrFail($id);
                    $this->layout->content = View::make('course.delete', array(
                        'course' => $course,
                    ));
                } else {
                    return Redirect::route('course.view', $id);
                }
            } else {
                return Redirect::route('course.view', $id);
            }
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Destroy course action.
     * 
     * @param $id Id of course
     * @return \Illuminate\View\View
     */
    public function destroy($id)
    {
        $tree = Tree::findOrFail(3);
        if ( $tree->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $course = Course::findOrFail($id);
                    $course->lectures()->delete();
                    $course->exercises()->delete();
                    $course->students()->detach();
                    $course->tags()->detach();
                    $course->delete();
                    Session::flash('message', Lang::get('app.course-destroyed'));
                    return Redirect::route('course.index');
                } else {
                    return Redirect::route('course.view', $id);
                }
            } else {
                return Redirect::route('course.view', $id);
            }
        } else {
            Session::flash('message', Lang::get('common.no-such-site'));
            return Redirect::route('homepage');
        }
    }
    
}
?>
