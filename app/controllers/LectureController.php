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
            $lectures = Lecture::paginate(6);
            $lecture_lead = Tree::findOrFail(5);
            $this->layout->content = View::make('lecture.index', array(
                'lectures' => $lectures,
                'lecture_lead' => $lecture_lead
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
            $lectures = DB::table('lectures')->where('course_id', '=', $id)->paginate(6);
            $lecture_lead = Tree::findOrFail(5);
            $this->layout->content = View::make('lecture.index', array(
                'lectures' => $lectures,
                'lecture_lead' => $lecture_lead
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
            $courses = Course::all()->lists('name', 'id');
            $tags = Tag::all()->lists('name','id');
            $this->layout->content = View::make('lecture.new', array(
                'courses' => $courses,
                'tags' => $tags,
            ));
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
            $lecture = Lecture::findOrFail($id);
            $lecture->title = Input::get('title');
            $lecture->lead = Input::get('lead');
            $lecture->content = Input::get('content');
            $lecture->course_id = Input::get('courses');
            $lecture->save();
            $lecture->tags()->sync(Input::get('tags'));

            $tree_students = Tree::findOrFail(2);
            $action = 'update';
            if( $tree_students->active == 1) {
                $lecture->sendMail($lecture->course_id, $action);
            }
            Session::flash('message', Lang::get('app.lecture-updated'));
            return Redirect::route('lecture.view', $lecture->id);
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
            $lecture = new Lecture();
            $lecture->title = Input::get('title');
            $lecture->lead = Input::get('lead');
            $lecture->content = Input::get('content');
            $lecture->course_id = Input::get('courses');
            $lecture->owner_id = 1;
            $lecture->owner_role_id = 1;
            $lecture->save();
            $lecture->tags()->sync(Input::get('tags'));

            $tree_students = Tree::findOrFail(2);
            $action = 'new';
            if( $tree_students->active == 1) {
                $lecture->sendMail($lecture->course_id, $action);
            }
            Session::flash('message', Lang::get('app.lecture-created'));
            return Redirect::route('lecture.view', $lecture->id);
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
            $lecture = Lecture::findOrFail($id);
            $this->layout->content = View::make('lecture.view', array(
                'lecture' => $lecture,
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
            $lecture = Lecture::findOrFail($id);
            $this->layout->content = View::make('lecture.delete', array(
                'lecture' => $lecture,
            ));
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
            $lecture = Lecture::findOrFail($id);
            $course_id = $lecture->course->id;
            $lecture->tags()->detach();
            $lecture->delete();
            Session::flash('message', Lang::get('app.lecture-destroyed'));
            return Redirect::route('lecture.indexCourse', $course_id);
        } else {
            Session::flash('message', Lang::get('common.no-such-site'));
            return Redirect::route('homepage');
        }
    }

}


 ?>
