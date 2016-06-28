<?php
/**
 * Lecture controller.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class LectureController.
 *
 * @package Controller
 * @author Maja Chłodnicka
 */
class LectureController extends BaseController
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
     * Index lectures action.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tree = Tree::findOrFail(3);
        $tree_lecture = Tree::findOrFail(5);
        if ( $tree->active == 1 && $tree_lecture->active == 1) {
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
            $lectures = Lecture::paginate(6);
            $lecture_lead = Tree::findOrFail(5);
            $bread = 0;
            $this->layout->content = View::make('lecture.index', array(
                'lectures' => $lectures,
                'lecture_lead' => $lecture_lead,
                'actions' => $actions,
                'bread' => $bread,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Index lectures by course id action.
     *
     * @param $id Id of course
     * @return \Illuminate\View\View
     */
    public function indexLecturesByCourses($id)
    {
        $tree = Tree::findOrFail(3);
        $tree_lecture = Tree::findOrFail(5);
        if ( $tree->active == 1 && $tree_lecture->active == 1) {
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
            $lectures = DB::table('lectures')->where('course_id', '=', $id)->paginate(6);
            $course = Course::findOrFail($id);
            $lecture_lead = Tree::findOrFail(5);
            $bread = 1;
            $this->layout->content = View::make('lecture.index', array(
                'lectures' => $lectures,
                'lecture_lead' => $lecture_lead,
                'actions' => $actions,
                'course' => $course,
                'bread' => $bread,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Edit lecture action.
     *
     * @param $id Id of lecture
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $tree = Tree::findOrFail(3);
        $tree_lecture = Tree::findOrFail(5);
        if ( $tree->active == 1 && $tree_lecture->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $lecture = Lecture::findOrFail($id);
                    $courses = Course::all()->lists('name', 'id');
                    $tags = Tag::all()->lists('name','id');
                    $lecture_tags = $lecture->tags()->lists('tag_id');
                    $attachment = DB::table('attachments')->where('id', '=', $lecture->attachment_id)->get();
                    $this->layout->content = View::make('lecture.edit', array(
                        'lecture' => $lecture,
                        'courses' => $courses,
                        'tags' => $tags,
                        'lecture_tags' => $lecture_tags,
                        'attachment' => $attachment,
                    ));
                } else {
                    return Redirect::route('lecture.view', $id);
                }
            } else {
                return Redirect::route('lecture.view', $id);
            }
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * New lecture action.
     *
     * @return \Illuminate\View\View
     */
    public function newOne()
    {
        $tree = Tree::findOrFail(3);
        $tree_lecture = Tree::findOrFail(5);
        if ( $tree->active == 1 && $tree_lecture->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $courses = Course::all()->lists('name', 'id');
                    $tags = Tag::all()->lists('name','id');
                    $this->layout->content = View::make('lecture.new', array(
                        'courses' => $courses,
                        'tags' => $tags,
                    ));
                } else {
                    return Redirect::route('lecture.index');
                }
            } else {
                return Redirect::route('lecture.index');
            }
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Update lectures action.
     *
     * @param $id Id of lecture
     * @return \Illuminate\View\View
     */
    public function update($id)
    {
        $tree = Tree::findOrFail(3);
        $tree_lecture = Tree::findOrFail(5);
        if ( $tree->active == 1 && $tree_lecture->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $lecture = Lecture::findOrFail($id);
                    $lecture->title = Input::get('title');
                    $lecture->lead = Input::get('lead');
                    $lecture->content = Input::get('content');
                    $lecture->course_id = Input::get('courses');

                    $rules = $lecture->rules();
                    $validator = Validator::make(Input::all(), $rules);

                    if ($validator->fails())
                    {
                        return Redirect::route('lecture.edit', $lecture->id)->withErrors($validator);
                    } else {
                        $image = Input::file('image');
                        $img_set = Input::get('img-isset');
                        $img_desc = Input::get('img-description');
                        $img_title = Input::get('img-title');
                        if($image != NULL && $img_set == 1) {
                            $destinationPath = 'uploads/';
                            $name = $image->getClientOriginalName();
                            $comma = strpos($name, '.');
                            $extension = substr($name, $comma);
                            $filename =  Str::random(10) . $name;
                            $url = $destinationPath . $filename;

                            $file = new Attachment();
                            $file->url = $url;
                            $file->name = $filename;
                            $file->description = $img_desc;
                            $file->title = $img_title;

                            Input::file('image')->move($destinationPath, $filename);

                            $file->save();
                            $lecture->attachment_id = $file->id;
                        }
                        if($img_set != 1) {
                            $lecture->attachment_id = NULL;
                        }
                        $lecture->save();
                        if(Input::get('tags') != NULL){
                            $lecture->tags()->sync(Input::get('tags'));
                        }

                        $tree_students = Tree::findOrFail(2);
                        $action = 'update';
                        if( $tree_students->active == 1) {
                            $lecture->sendMail($lecture->course_id, $action);
                        }
                        Session::flash('message', Lang::get('app.lecture-updated'));
                        return Redirect::route('lecture.view', $lecture->id);
                    }
                } else {
                    return Redirect::route('lecture.view', $id);
                }
            } else {
                return Redirect::route('lecture.view', $id);
            }

        } else {
            Session::flash('message', Lang::get('common.no-such-site'));
            return Redirect::route('homepage');
        }
    }

    /**
     * Create lecture action.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tree = Tree::findOrFail(3);
        $tree_lecture = Tree::findOrFail(5);
        if ( $tree->active == 1 && $tree_lecture->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $lecture = new Lecture();
                    $lecture->title = Input::get('title');
                    $lecture->lead = Input::get('lead');
                    $lecture->content = Input::get('content');
                    $lecture->course_id = Input::get('courses');
                    $lecture->owner_id = 1;
                    $lecture->owner_role_id = 1;

                    $rules = $lecture->rules();
                    $validator = Validator::make(Input::all(), $rules);

                    if ($validator->fails())
                    {
                        return Redirect::route('lecture.new')
                            ->withErrors($validator)
                            ->withInput();
                    } else {
                        $image = Input::file('image');
                        if($image != NULL) {
                            $destinationPath = 'uploads/';
                            $filename = $image->getClientOriginalName();
                            $url = $destinationPath . $filename;

                            $file = new Attachment();
                            $file->url = $url;
                            $file->name = $filename;
                            $file->description = Input::get('img-description');
                            $file->title = Input::get('img-title');


                            Input::file('image')->move($destinationPath, $filename);

                            $file->save();
                            $lecture->attachment_id = $file->id;
                        }
                        $lecture->save();
                        if(Input::get('tags') != NULL){
                            $lecture->tags()->sync(Input::get('tags'));
                        }

                        $tree_students = Tree::findOrFail(2);
                        $action = 'create';
                        if( $tree_students->active == 1) {
                            $lecture->sendMail($lecture->course_id, $action);
                        }
                        Session::flash('message', Lang::get('app.lecture-created'));
                        return Redirect::route('lecture.view', $lecture->id);
                    }
                } else {
                    return Redirect::route('lecture.index');
                }
            } else {
                return Redirect::route('lecture.index');
            }
        } else {
            Session::flash('message', Lang::get('common.no-such-site'));
            return Redirect::route('homepage');
        }
    }

    /**
     * View lecture action.
     *
     * @param $id Id of lecture
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        $tree = Tree::findOrFail(3);
        $tree_lecture = Tree::findOrFail(5);
        if ( $tree->active == 1 && $tree_lecture->active == 1) {
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
            $lecture = Lecture::findOrFail($id);
            $attachment = DB::table('attachments')->where('id', '=', $lecture->attachment_id)->get();
            $this->layout->content = View::make('lecture.view', array(
                'lecture' => $lecture,
                'actions' => $actions,
                'attachment' => $attachment,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Delete lecture action.
     *
     * @param $id Id of lecture
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        $tree = Tree::findOrFail(3);
        $tree_lecture = Tree::findOrFail(5);
        if ( $tree->active == 1 && $tree_lecture->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $lecture = Lecture::findOrFail($id);
                    $this->layout->content = View::make('lecture.delete', array(
                        'lecture' => $lecture,
                    ));
                } else {
                    return Redirect::route('lecture.view', $id);
                }
            } else {
                return Redirect::route('lecture.view', $id);
            }
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Destroy lectures action.
     *
     * @param $id Id of lecture
     * @return \Illuminate\View\View
     */
    public function destroy($id)
    {
        $tree = Tree::findOrFail(3);
        $tree_lecture = Tree::findOrFail(5);
        if ( $tree->active == 1 && $tree_lecture->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $lecture = Lecture::findOrFail($id);
                    $course_id = $lecture->course->id;
                    $lecture->tags()->detach();
                    $lecture->delete();
                    Session::flash('message', Lang::get('app.lecture-destroyed'));
                    return Redirect::route('lecture.indexCourse', $course_id);
                } else {
                    return Redirect::route('lecture.view', $id);
                }
            } else {
                return Redirect::route('lecture.view', $id);
            }
        } else {
            Session::flash('message', Lang::get('common.no-such-site'));
            return Redirect::route('homepage');
        }
    }

}


 ?>
