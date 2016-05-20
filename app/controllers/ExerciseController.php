<?php
/**
 * Exercise controller.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class ExerciseController.
 *
 * @package Controller
 * @author Maja Chłodnicka
 */
class ExerciseController extends BaseController
{
    /**
     * @param $layout Base layout
     */
    protected $layout = 'layouts.master';

    /**
     * Index exercises action.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            $exercises = Exercise::paginate(6);
            $exercise_lead = Tree::findOrFail(6);
            $exercise_difficulty = new Exercise();
            $difficulty = $exercise_difficulty->difficulty();
            $this->layout->content = View::make('exercise.index', array(
                'exercises' => $exercises,
                'difficulty' => $difficulty,
                'exercise_lead' => $exercise_lead,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Index exercises by course id action.
     *
     * @param $id Id of course
     * @return \Illuminate\View\View
     */
    public function indexExerciseByCourse($id)
    {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            $exercises = DB::table('exercises')->where('course_id', "=", $id)->paginate(6);
            $exercise_lead = Tree::findOrFail(6);
            $exercise_difficulty = new Exercise();
            $difficulty = $exercise_difficulty->difficulty();
            $this->layout->content = View::make('exercise.index', array(
                'exercises' => $exercises,
                'difficulty' => $difficulty,
                'exercise_lead' => $exercise_lead,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Search for exercises action.
     *
     * @return \Illuminate\View\View
     */
    public function search()
    {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            $exercise_lead = Tree::findOrFail(6);
            $searchParams = array(
                'content' => Input::get('content'),
                'solution' => Input::get('solution_access'),
                'difficulty' => Input::get('difficulty'),
            );
            $searchParams['content'] = htmlspecialchars($searchParams['content']);
            if($searchParams['content'] == NULL & $searchParams['solution'] == NULL && $searchParams['difficulty'] == 0) {
                $exercises = Exercise::paginate(6);
            } elseif($searchParams['content'] == NULL & $searchParams['solution'] == NULL) {
                $exercises = DB::table('exercises')->where('difficulty', '=', $searchParams['difficulty'])->paginate(6);
            } elseif($searchParams['content'] == NULL & $searchParams['difficulty'] == 0) {
                $exercises = DB::table('exercises')->where('solution_access', '=', $searchParams['solution'])->paginate(6);
            } else if($searchParams['solution'] == NULL && $searchParams['difficulty'] == 0) {
                $exercises = DB::table('exercises')->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->paginate(6);
            } elseif($searchParams['solution'] == NULL) {
                $exercises = DB::table('exercises')->where('difficulty', '=', $searchParams['difficulty'])->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->paginate(6);
            } elseif($searchParams['difficulty'] == 0) {
                $exercises = DB::table('exercises')->where('solution_access', '=', $searchParams['solution'])->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->paginate(6);
            } else {
                $exercises = DB::table('exercises')->where('solution_access', '=', $searchParams['solution'])->where('difficulty', '=', $searchParams['difficulty'])->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->paginate(6);
            }
            $exercise_difficulty = new Exercise();
            $difficulty = $exercise_difficulty->difficulty();

            $this->layout->content = View::make('exercise.index', array(
                'exercises' => $exercises,
                'difficulty' => $difficulty,
                'exercise_lead' => $exercise_lead,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Generate list of exercises by course to save in PDF action.
     *
     * @param $id Id of course
     * @return \Illuminate\View\View
     */
    public function generate($id)
    {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            $course_id = $id;
            $exercise_tags = DB::table('exercise_tag')->join('exercises', 'exercises.id', '=', 'exercise_tag.exercise_id')->where('course_id', '=', $id)->distinct()->lists('tag_id');
            $exercise_lectures = DB::table('exercises')->where('course_id', '=', $id)->whereNotNull('lecture_id')->distinct()->lists('lecture_id');
            $exercise_difficulty = new Exercise();
            $difficulty = $exercise_difficulty->difficulty();
            $this->layout->content = View::make('exercise.generate', array(
                'difficulty' => $difficulty,
                'exercise_lectures' => $exercise_lectures,
                'exercise_tags' =>$exercise_tags,
                'course_id' => $course_id,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    public function show_generated($id)
    {
        $searchParams = array(
            'content' => Input::get('content'),
            'number' => Input::get('number'),
            'difficulty' => Input::get('difficulty'),
            'exercise_tags' => Input::get('exercise_tags'),
            'exercise_lecture' => Input::get('exercise_lecture'),
        );
        $exercise = new Exercise();
        $course_id = $id;
        $rules = $exercise->rules_generate();

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::route('exercise.generate', $course_id)
                ->withErrors($validator)
                ->withInput();
        } else {

            if($searchParams['content'] == NULL && $searchParams['difficulty'] == 0 && $searchParams['exercise_lecture'] == NULL && $searchParams['exercise_tags'] == NULL) {
                $exercises = DB::table('exercises')->where('course_id', '=', $id);
            } elseif($searchParams['exercise_tags'] == NULL){
                if($searchParams['difficulty'] == 0) {
                    if($searchParams['content'] == NULL){
                        $exercises = DB::table('exercises')->where('course_id', '=', $id)->where('lecture_id', '=', $searchParams['exercise_lecture'])->limit($searchParams['number'])->get();
                    } elseif($searchParams['exercise_lecture'] == NULL){
                        $exercises = DB::table('exercises')->where('course_id', '=', $id)->where('content', 'LIKE', '%'.$searchParams['content'].'%')->limit($searchParams['number'])->get();

                    } else {
                        $exercises = DB::table('exercises')->where('course_id', '=', $id)->where('lecture_id', '=', $searchParams['exercise_lecture'])->where('content', 'LIKE', '%'.$searchParams['content'].'%')->limit($searchParams['number'])->get();
                    }
                } elseif( $searchParams['exercise_lecture'] == NULL) {
                    if ($searchParams['content'] == NULL) {
                        $exercises = DB::table('exercises')->where('course_id', '=', $id)->where('difficulty', '=', $searchParams['difficulty'])->limit($searchParams['number'])->get();
                    } else {
                        $exercises = DB::table('exercises')->where('course_id', '=', $id)->where('difficulty', '=', $searchParams['difficulty'])->where('content', 'LIKE', '%'.$searchParams['content'].'%')->limit($searchParams['number'])->get();
                    }
                } elseif( $searchParams['content'] == NULL) {
                    $exercises = DB::table('exercises')->where('course_id', '=', $id)->where('difficulty', '=', $searchParams['difficulty'])->where('lecture_id', '=', $searchParams['exercise_lecture'])->limit($searchParams['number'])->get();
                }
            } elseif ($searchParams['difficulty'] == 0) {
                if($searchParams['content'] == NULL){
                    $exercises = DB::table('exercises')->join('exercise_tag', 'exercises.id', '=', 'exercise_tag.exercise_id')->where('course_id', '=', $id)->where('lecture_id', '=', $searchParams['exercise_lecture'])->where('tag_id', '=', $searchParams['exercise_tags'])->limit($searchParams['number'])->get();
                } elseif($searchParams['exercise_lecture'] == NULL){
                    $exercises = DB::table('exercises')->join('exercise_tag', 'exercises.id', '=', 'exercise_tag.exercise_id')->where('course_id', '=', $id)->where('tag_id', '=', $searchParams['exercise_tags'])->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->limit($searchParams['number'])->get();
                } else {
                    $exercises = DB::table('exercises')->join('exercise_tag', 'exercises.id', '=', 'exercise_tag.exercise_id')->where('course_id', '=', $id)->where('lecture_id', '=', $searchParams['exercise_lecture'])->where('tag_id', '=', $searchParams['exercise_tags'])->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->limit($searchParams['number'])->get();
                }
            } elseif($searchParams['content'] == NULL) {
                if($searchParams['exercise_lecture'] == NULL){
                    $exercises = DB::table('exercises')->join('exercise_tag', 'exercises.id', '=', 'exercise_tag.exercise_id')->where('course_id', '=', $id)->where('difficulty', '=', $searchParams['difficulty'])->where('tag_id', '=', $searchParams['exercise_tags'])->limit($searchParams['number'])->get();
                } else {
                    $exercises = DB::table('exercises')->join('exercise_tag', 'exercises.id', '=', 'exercise_tag.exercise_id')->where('course_id', '=', $id)->where('difficulty', '=', $searchParams['difficulty'])->where('lecture_id', '=', $searchParams['exercise_lecture'])->where('tag_id', '=', $searchParams['exercise_tags'])->limit($searchParams['number'])->get();
                }
            } elseif ($searchParams['exercise_lecture'] == NULL){
                $exercises = DB::table('exercises')->join('exercise_tag', 'exercises.id', '=', 'exercise_tag.exercise_id')->where('course_id', '=', $id)->where('difficulty', '=', $searchParams['difficulty'])->where('tag_id', '=', $searchParams['exercise_tags'])->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->limit($searchParams['number'])->get();
            } else {
                $exercises = DB::table('exercises')->join('exercise_tag', 'exercises.id', '=', 'exercise_tag.exercise_id')->where('course_id', '=', $id)->where('difficulty', '=', $searchParams['difficulty'])->where('lecture_id', '=', $searchParams['exercise_lecture'])->where('tag_id', '=', $searchParams['exercise_tags'])->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->limit($searchParams['number'])->get();
            }
            $exercise_tags = DB::table('exercise_tag')->join('exercises', 'exercises.id', '=', 'exercise_tag.exercise_id')->join('tags', 'tags.id', '=', 'exercise_tag.tag_id')->where('course_id', '=', $id)->distinct()->groupBy('tag_id')->get();
            $exercise_lectures = DB::table('lectures')->where('course_id', '=', $id)->distinct()->get();
            $exercise_difficulty = new Exercise();
            $difficulty = $exercise_difficulty->difficulty();
            $this->layout->content = View::make('exercise.generate', array(
                'exercises' => $exercises,
                'difficulty' => $difficulty,
                'exercise_lectures' => $exercise_lectures,
                'exercise_tags' =>$exercise_tags,
                'course_id' => $course_id,
            ));
        }
    }

    /**
     * Generate PDF by checked exercises action.
     *
     * @return \Illuminate\View\View
     */
    public function generateByInput(){
        $exercises_checked = Input::get('exercises');
        $checked = array_map( create_function('$value', 'return (int)$value;'),
            $exercises_checked);

        if(is_array($checked))
        {
            $exercises['exercises'] = DB::table('exercises')->whereIn('id', $checked)->get();
        }
        $answers = Input::get('answers');
        if($answers != 'on'){
            $pdf = PDF::loadView('exercise.generated', $exercises)->download();
        } else {
            $pdf = PDF::loadView('exercise.generatedAnswers', $exercises)->download();
        }
        return $pdf;
    }

    /**
     * Index exercise by lecture id action.
     *
     * @param  $id Id of lecture
     * @return \Illuminate\View\View
     */
    public function indexExerciseByLecture($id)
    {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            $exercise_lead = Tree::findOrFail(6);
            $exercises = DB::table('exercises')->where('lecture_id', '=', $id)->paginate(6);
            $exercise_difficulty = new Exercise();
            $difficulty = $exercise_difficulty->difficulty();
            $this->layout->content = View::make('exercise.index', array(
                'exercises' => $exercises,
                'difficulty' => $difficulty,
                'exercise_lead' => $exercise_lead,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Index exercise by difficulty id action.
     *
     * @param  $id Id of difficulty level
     * @return \Illuminate\View\View
     */
    public function indexExerciseByDifficulty($id, $course)
    {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            $exercise_lead = Tree::findOrFail(6);
            $exercises = DB::table('exercises')->where('difficulty', '=', $id)->where('course_id', '=', $course)->paginate(6);
            $exercise_difficulty = new Exercise();
            $difficulty = $exercise_difficulty->difficulty();
            $this->layout->content = View::make('exercise.index', array(
                'exercises' => $exercises,
                'difficulty' => $difficulty,
                'exercise_lead' => $exercise_lead,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Edit exercise action.
     *
     * @param  $id Id of exercise
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            $exercise = Exercise::findOrFail($id);
            $courses = Course::all()->lists('name', 'id');
            $lectures = DB::table('lectures')->where('course_id', '=', $exercise->course_id)->get();
            $tags = Tag::all()->lists('name','id');
            $exercise_tags = $exercise->tags()->lists('tag_id');
            $exercise_difficulty = new Exercise();
            $difficulty = $exercise_difficulty->difficulty();
            $this->layout->content = View::make('exercise.edit', array(
                'exercise' => $exercise,
                'courses' => $courses,
                'tags' => $tags,
                'exercise_tags' => $exercise_tags,
                'lectures' => $lectures,
                'difficulty' => $difficulty,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Update exercise action.
     *
     * @param  $id Id of exercise
     * @return \Illuminate\View\View
     */
    public function update($id)
    {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            $exercise = Exercise::findOrFail($id);
            $exercise->title = Input::get('title');
            $exercise->content = Input::get('content');
            $exercise->solution = Input::get('solution');
            $exercise->solution_access = Input::get('solution_access');
            $exercise->difficulty = Input::get('difficulty');
            $exercise->lecture_id = Input::get('lectures');
            $exercise->course_id = Input::get('courses');

            $rules = $exercise->rules();
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                return Redirect::route('exercise.edit', $exercise->id)
                    ->withErrors($validator);
            } else {
                $exercise->save();
                if(Input::get('tags') != NULL){
                    $exercise->tags()->sync(Input::get('tags'));
                }
                $tree_students = Tree::findOrFail(2);
                $action = 'update';
                if( $tree_students->active == 1) {
                    $exercise->sendMail($exercise->course_id, $action);
                }
                Session::flash('message', Lang::get('app.exercise_updated'));
                return Redirect::route('exercise.view', $exercise->id);
            }

        } else {
            Session::flash('message', Lang::get('common.no-such-site'));
            return Redirect::route('homepage');
        }
    }

    /**
     * New exercise action.
     *
     * @return \Illuminate\View\View
     */
    public function newOne()
    {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            $courses = Course::all()->lists('name', 'id');
            $lectures = Lecture::all()->lists('title', 'id');
            $tags = Tag::all()->lists('name','id');
            $exercise = new Exercise();
            $difficulty = $exercise->difficulty();
            $this->layout->content = View::make('exercise.new', array(
                'courses' => $courses,
                'lectures' => $lectures,
                'tags' => $tags,
                'difficulty' => $difficulty,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Create new exercise action.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            $exercise = new Exercise();
            $exercise->title = Input::get('title');
            $exercise->content = Input::get('content');
            $exercise->solution = Input::get('solution');
            $exercise->solution_access = Input::get('solution_access');
            $exercise->difficulty = Input::get('difficulty');
            $exercise->lecture_id = Input::get('lectures');
            $exercise->course_id = Input::get('courses');
            $exercise->owner_id = 1;
            $exercise->owner_role_id = 1;

            $rules = $exercise->rules();
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                return Redirect::route('exercise.new')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $exercise->save();
                if(Input::get('tags') != NULL){
                    $exercise->tags()->sync(Input::get('tags'));
                }
                $tree_students = Tree::findOrFail(2);
                $action = 'new';
                if( $tree_students->active == 1) {
                    $exercise->sendMail($exercise->course_id, $action);
                }
                Session::flash('message', Lang::get('app.exercise-created'));
                return Redirect::route('exercise.view', $exercise->id);
            }

        } else {
            Session::flash('message', Lang::get('common.no-such-site'));
            return Redirect::route('homepage');
        }
    }

    /**
     * View exercise action.
     *
     * @param  $id Id of exercise
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            $exercise = Exercise::findOrFail($id);
            $this->layout->content = View::make('exercise.view', array(
                'exercise' => $exercise,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Delete exercise action.
     *
     * @param  $id Id of exercise
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            $exercise = Exercise::findOrFail($id);
            $this->layout->content = View::make('exercise.delete', array(
                'exercise' => $exercise,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Destroy exercise action.
     *
     * @param  $id Id of exercise
     * @return \Illuminate\View\View
     */
    public function destroy($id) {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            $exercise = Exercise::findOrFail($id);
            $course_id = $exercise->course->id;
            $exercise->tags()->detach();
            $exercise->delete();
            Session::flash('message', Lang::get('app.exercise-destroyed'));
            return Redirect::route('exercise.indexCourse', $course_id);
        } else {
            Session::flash('message', Lang::get('common.no-such-site'));
            return Redirect::route('homepage');
        }
    }
    

}


 ?>
