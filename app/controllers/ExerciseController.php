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
     * Index exercises action.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $actions = 1;
                    $exercises = Exercise::paginate(6);

                } else {
                    $actions = 0;
                    $exercises = DB::table('exercises')->whereNull('access')->paginate(6);
                }
            } else {
                $actions = 0;
                $exercises = DB::table('exercises')->whereNull('access')->paginate(6);
            }


            $exercise_lead = Tree::findOrFail(6);
            $exercise_difficulty = new Exercise();
            $difficulty = $exercise_difficulty->difficulty();
            $bread = 0;
            $this->layout->content = View::make('exercise.index', array(
                'exercises' => $exercises,
                'difficulty' => $difficulty,
                'exercise_lead' => $exercise_lead,
                'actions' => $actions,
                'bread' => $bread,
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
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $actions = 1;
                    $exercises = DB::table('exercises')->where('course_id', "=", $id)->paginate(6);
                } else {
                    $actions = 0;
                    $exercises = DB::table('exercises')->whereNull('access')->where('course_id', "=", $id)->paginate(6);
                }
            } else {
                $actions = 0;
                $exercises = DB::table('exercises')->whereNull('access')->where('course_id', "=", $id)->paginate(6);
            }

            $exercise_lead = Tree::findOrFail(6);
            $exercise_difficulty = new Exercise();
            $difficulty = $exercise_difficulty->difficulty();
            $course = Course::findOrFail($id);
            $bread = 1;
            $this->layout->content = View::make('exercise.index', array(
                'exercises' => $exercises,
                'difficulty' => $difficulty,
                'exercise_lead' => $exercise_lead,
                'actions' => $actions,
                'bread' => $bread,
                'course' => $course,
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
            $exercise_lead = Tree::findOrFail(6);
            $searchParams = array(
                'content' => Input::get('content'),
                'solution' => Input::get('solution_access'),
                'difficulty' => Input::get('difficulty'),
            );
            if(Auth::check()){
                if($role == 1) {
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
                } else {
                    $searchParams['content'] = htmlspecialchars($searchParams['content']);
                    if($searchParams['content'] == NULL & $searchParams['solution'] == NULL && $searchParams['difficulty'] == 0) {
                        $exercises = DB::table('exercises')->whereNull('access')->paginate(6);
                    } elseif($searchParams['content'] == NULL & $searchParams['solution'] == NULL) {
                        $exercises = DB::table('exercises')->where('difficulty', '=', $searchParams['difficulty'])->whereNull('access')->paginate(6);
                    } elseif($searchParams['content'] == NULL & $searchParams['difficulty'] == 0) {
                        $exercises = DB::table('exercises')->where('solution_access', '=', $searchParams['solution'])->whereNull('access')->paginate(6);
                    } else if($searchParams['solution'] == NULL && $searchParams['difficulty'] == 0) {
                        $exercises = DB::table('exercises')->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->whereNull('access')->paginate(6);
                    } elseif($searchParams['solution'] == NULL) {
                        $exercises = DB::table('exercises')->where('difficulty', '=', $searchParams['difficulty'])->whereNull('access')->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->paginate(6);
                    } elseif($searchParams['difficulty'] == 0) {
                        $exercises = DB::table('exercises')->where('solution_access', '=', $searchParams['solution'])->whereNull('access')->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->paginate(6);
                    } else {
                        $exercises = DB::table('exercises')->where('solution_access', '=', $searchParams['solution'])->whereNull('access')->where('difficulty', '=', $searchParams['difficulty'])->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->paginate(6);
                    }
                }
            } else {
                $searchParams['content'] = htmlspecialchars($searchParams['content']);
                if($searchParams['content'] == NULL & $searchParams['solution'] == NULL && $searchParams['difficulty'] == 0) {
                    $exercises = DB::table('exercises')->whereNull('access')->paginate(6);
                } elseif($searchParams['content'] == NULL & $searchParams['solution'] == NULL) {
                    $exercises = DB::table('exercises')->where('difficulty', '=', $searchParams['difficulty'])->whereNull('access')->paginate(6);
                } elseif($searchParams['content'] == NULL & $searchParams['difficulty'] == 0) {
                    $exercises = DB::table('exercises')->where('solution_access', '=', $searchParams['solution'])->whereNull('access')->paginate(6);
                } else if($searchParams['solution'] == NULL && $searchParams['difficulty'] == 0) {
                    $exercises = DB::table('exercises')->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->whereNull('access')->paginate(6);
                } elseif($searchParams['solution'] == NULL) {
                    $exercises = DB::table('exercises')->where('difficulty', '=', $searchParams['difficulty'])->whereNull('access')->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->paginate(6);
                } elseif($searchParams['difficulty'] == 0) {
                    $exercises = DB::table('exercises')->where('solution_access', '=', $searchParams['solution'])->whereNull('access')->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->paginate(6);
                } else {
                    $exercises = DB::table('exercises')->where('solution_access', '=', $searchParams['solution'])->whereNull('access')->where('difficulty', '=', $searchParams['difficulty'])->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->paginate(6);
                }
            }

            $exercise_difficulty = new Exercise();
            $difficulty = $exercise_difficulty->difficulty();
            $bread = 0;

            $this->layout->content = View::make('exercise.index', array(
                'exercises' => $exercises,
                'difficulty' => $difficulty,
                'exercise_lead' => $exercise_lead,
                'actions' => $actions,
                'search' => $bread,
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
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $course_id = $id;
                    $exercise_tags = DB::table('exercise_tag')->join('exercises', 'exercises.id', '=', 'exercise_tag.exercise_id')->join('tags', 'tags.id', '=', 'exercise_tag.tag_id')->where('course_id', '=', $id)->distinct()->groupBy('tag_id')->lists('name', 'tag_id');
                    $exercise_lectures = DB::table('lectures')->where('course_id', '=', $id)->lists('title', 'id');
                    $exercise_difficulty = new Exercise();
                    $difficulty = $exercise_difficulty->difficulty();
                    $this->layout->content = View::make('exercise.generate', array(
                        'difficulty' => $difficulty,
                        'exercise_lectures' => $exercise_lectures,
                        'exercise_tags' =>$exercise_tags,
                        'course_id' => $course_id,
                    ));
                } else {
                    return Redirect::route('exercise.index');
                }
            } else {
                return Redirect::route('exercise.index');
            }
        } else {
            return Redirect::route('homepage');
        }
    }

    public function show_generated($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if($role == 1) {
                $searchParams = array(
                    'content' => Input::get('content'),
                    'number' => Input::get('number'),
                    'difficulty' => Input::get('difficulty'),
                    'exercise_tags' => Input::get('exercise_tags'),
                    'exercise_lecture' => Input::get('exercise_lectures'),
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
                        $exercises = DB::table('exercises')->where('course_id', '=', $id)->limit($searchParams['number'])->get();
                    } elseif($searchParams['exercise_tags'] == NULL){
                        if($searchParams['difficulty'] == 0) {
                            if($searchParams['content'] == NULL){
                                $exercises = DB::table('exercises')->where('course_id', '=', $id)->whereIn('lecture_id', $searchParams['exercise_lecture'])->limit($searchParams['number'])->get();
                            } elseif($searchParams['exercise_lecture'] == NULL){
                                $exercises = DB::table('exercises')->where('course_id', '=', $id)->where('content', 'LIKE', '%'.$searchParams['content'].'%')->limit($searchParams['number'])->get();

                            } else {
                                $exercises = DB::table('exercises')->where('course_id', '=', $id)->whereIn('lecture_id', '=', $searchParams['exercise_lecture'])->where('content', 'LIKE', '%'.$searchParams['content'].'%')->limit($searchParams['number'])->get();
                            }
                        } elseif( $searchParams['exercise_lecture'] == NULL) {
                            if ($searchParams['content'] == NULL) {
                                $exercises = DB::table('exercises')->where('course_id', '=', $id)->where('difficulty', '=', $searchParams['difficulty'])->limit($searchParams['number'])->get();
                            } else {
                                $exercises = DB::table('exercises')->where('course_id', '=', $id)->where('difficulty', '=', $searchParams['difficulty'])->where('content', 'LIKE', '%'.$searchParams['content'].'%')->limit($searchParams['number'])->get();
                            }
                        } elseif( $searchParams['content'] == NULL) {
                            $exercises = DB::table('exercises')->where('course_id', '=', $id)->where('difficulty', '=', $searchParams['difficulty'])->whereIn('lecture_id', '=', $searchParams['exercise_lecture'])->limit($searchParams['number'])->get();
                        }
                    } elseif ($searchParams['difficulty'] == 0) {
                        if($searchParams['content'] == NULL){
                            if($searchParams['exercise_lecture'] == NULL){
                                $exercises = DB::table('exercises')->join('exercise_tag', 'exercises.id', '=', 'exercise_tag.exercise_id')->whereIn('tag_id', $searchParams['exercise_tags'])->limit($searchParams['number'])->get();
                            }else {
                                $exercises = DB::table('exercises')->join('exercise_tag', 'exercises.id', '=', 'exercise_tag.exercise_id')->where('course_id', '=', $id)->whereIn('lecture_id', '=', $searchParams['exercise_lecture'])->whereIn('tag_id', $searchParams['exercise_tags'])->limit($searchParams['number'])->get();
                            }
                        } elseif($searchParams['exercise_lecture'] == NULL){
                            $exercises = DB::table('exercises')->join('exercise_tag', 'exercises.id', '=', 'exercise_tag.exercise_id')->where('course_id', '=', $id)->whereIn('tag_id', $searchParams['exercise_tags'])->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->limit($searchParams['number'])->get();
                        } else {
                            $exercises = DB::table('exercises')->join('exercise_tag', 'exercises.id', '=', 'exercise_tag.exercise_id')->where('course_id', '=', $id)->whereIn('lecture_id', '=', $searchParams['exercise_lecture'])->whereIn('tag_id', $searchParams['exercise_tags'])->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->limit($searchParams['number'])->get();
                        }
                    } elseif($searchParams['content'] == NULL) {
                        if($searchParams['exercise_lecture'] == NULL){
                            $exercises = DB::table('exercises')->join('exercise_tag', 'exercises.id', '=', 'exercise_tag.exercise_id')->where('course_id', '=', $id)->where('difficulty', '=', $searchParams['difficulty'])->whereIn('tag_id', $searchParams['exercise_tags'])->limit($searchParams['number'])->get();
                        } else {
                            $exercises = DB::table('exercises')->join('exercise_tag', 'exercises.id', '=', 'exercise_tag.exercise_id')->where('course_id', '=', $id)->where('difficulty', '=', $searchParams['difficulty'])->whereIn('lecture_id', '=', $searchParams['exercise_lecture'])->whereIn('tag_id', $searchParams['exercise_tags'])->limit($searchParams['number'])->get();
                        }
                    } elseif ($searchParams['exercise_lecture'] == NULL){
                        $exercises = DB::table('exercises')->join('exercise_tag', 'exercises.id', '=', 'exercise_tag.exercise_id')->where('course_id', '=', $id)->where('difficulty', '=', $searchParams['difficulty'])->whereIn('tag_id', $searchParams['exercise_tags'])->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->limit($searchParams['number'])->get();
                    } else {
                        $exercises = DB::table('exercises')->join('exercise_tag', 'exercises.id', '=', 'exercise_tag.exercise_id')->where('course_id', '=', $id)->where('difficulty', '=', $searchParams['difficulty'])->whereIn('lecture_id', '=', $searchParams['exercise_lecture'])->whereIn('tag_id', $searchParams['exercise_tags'])->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->limit($searchParams['number'])->get();
                    }
                    $exercise_tags = DB::table('exercise_tag')->join('exercises', 'exercises.id', '=', 'exercise_tag.exercise_id')->join('tags', 'tags.id', '=', 'exercise_tag.tag_id')->where('course_id', '=', $id)->distinct()->groupBy('tag_id')->lists('name', 'tag_id');
                    $exercise_lectures = DB::table('lectures')->where('course_id', '=', $id)->lists('title', 'id');
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
            } else {
                return Redirect::route('exercise.index');
            }
        } else {
            return Redirect::route('exercise.index');
        }
    }

    /**
     * Generate PDF by checked exercises action.
     *
     * @return \Illuminate\View\View
     */
    public function generateByInput(){
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if($role == 1) {
                $exercises_checked = Input::get('exercises');
                $checked = array_map( create_function('$value', 'return (int)$value;'),
                    $exercises_checked);

                if(is_array($checked))
                {
                    $exercises['exercises'] = DB::table('exercises')->whereIn('id', $checked)->get();
                }
                $answers = Input::get('answers');
                $exercises['desc'] = Input::get('content');
                if($answers != 'on'){
                    $pdf = PDF::loadView('exercise.generated', $exercises)->download('Arkusz.pdf');
                } else {
                    $pdf = PDF::loadView('exercise.generatedAnswers', $exercises)->download('Arkusz-z-odpowiedziami.pdf');
                }
                return $pdf;
            } else {
                return Redirect::route('exercise.index');
            }
        } else {
            return Redirect::route('exercise.index');
        }
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
            $exercise_lead = Tree::findOrFail(6);

            $exercises = DB::table('exercises')->where('lecture_id', '=', $id)->paginate(6);
            $lecture = Lecture::findOrFail($id);
            $exercise_difficulty = new Exercise();
            $difficulty = $exercise_difficulty->difficulty();
            $bread = 1;
            $course = Course::findOrFail($lecture->course_id);
            $this->layout->content = View::make('exercise.index', array(
                'exercises' => $exercises,
                'difficulty' => $difficulty,
                'exercise_lead' => $exercise_lead,
                'actions' => $actions,
                'course' => $course,
                'bread' => $bread,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Index exercise by lecture id action.
     *
     * @param  $id Id of lecture
     * @return \Illuminate\View\View
     */
    public function indexExerciseByTag($id)
    {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
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
            $exercise_lead = Tree::findOrFail(6);

            $exercises = DB::table('exercises')->join('exercise_tag', 'exercises.id', '=', 'exercise_tag.exercise_id')->where('tag_id', '=', $id)->paginate(6);
            $exercise_difficulty = new Exercise();
            $difficulty = $exercise_difficulty->difficulty();
            $bread = 0;
            $this->layout->content = View::make('exercise.index', array(
                'exercises' => $exercises,
                'difficulty' => $difficulty,
                'exercise_lead' => $exercise_lead,
                'actions' => $actions,
                'bread' => $bread,
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
            $exercise_lead = Tree::findOrFail(6);
            $exercises = DB::table('exercises')->where('difficulty', '=', $id)->where('course_id', '=', $course)->paginate(6);
            $exercise_difficulty = new Exercise();
            $difficulty = $exercise_difficulty->difficulty();
            $bread = 0;
            $this->layout->content = View::make('exercise.index', array(
                'exercises' => $exercises,
                'difficulty' => $difficulty,
                'exercise_lead' => $exercise_lead,
                'actions' => $actions,
                'bread' => $bread,
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
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
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
                    return Redirect::route('exercise.view', $id);
                }
            } else {
                return Redirect::route('exercise.view', $id);
            }
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
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $exercise = Exercise::findOrFail($id);
                    $exercise->title = Input::get('title');
                    $exercise->content = Input::get('content');
                    $exercise->solution = Input::get('solution');
                    $exercise->solution_access = Input::get('solution_access');
                    $exercise->difficulty = Input::get('difficulty');
                    $exercise->lecture_id = Input::get('lectures');
                    $exercise->course_id = Input::get('courses');
                    $exercise->access = Input::get('access');

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
                    return Redirect::route('exercise.view', $id);
                }
            } else {
                return Redirect::route('exercise.view', $id);
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
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
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
                    return Redirect::route('exercise.index');
                }
            } else {
                return Redirect::route('exercise.index');
            }
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
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $exercise = new Exercise();
                    $exercise->title = Input::get('title');
                    $exercise->content = Input::get('content');
                    $exercise->solution = Input::get('solution');
                    $exercise->solution_access = Input::get('solution_access');
                    $exercise->difficulty = Input::get('difficulty');
                    $exercise->lecture_id = Input::get('lectures');
                    $exercise->course_id = Input::get('courses');
                    $exercise->access = Input::get('access');
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
                    return Redirect::route('exercise.index');
                }
            } else {
                return Redirect::route('exercise.index');
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
            $exercise = Exercise::findOrFail($id);
            if($exercise->access == NULL) {
                $this->layout->content = View::make('exercise.view', array(
                    'exercise' => $exercise,
                    'actions' => $actions,
                ));
            } elseif (Auth::check()){
                if($role == 1) {
                    $this->layout->content = View::make('exercise.view', array(
                        'exercise' => $exercise,
                        'actions' => $actions,
                    ));
                } else {
                    return Redirect::route('exercise.index')->with('message','Zadanie niedostępne');
                }
            } else {
                return Redirect::route('exercise.index')->with('message','Zadanie niedostępne');
            }

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
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $exercise = Exercise::findOrFail($id);
                    $this->layout->content = View::make('exercise.delete', array(
                        'exercise' => $exercise,
                    ));
                } else {
                    return Redirect::route('exercise.view', $id);
                }
            } else {
                return Redirect::route('exercise.view', $id);
            }
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
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $exercise = Exercise::findOrFail($id);
                    $course_id = $exercise->course->id;
                    $exercise->tags()->detach();
                    $exercise->delete();
                    Session::flash('message', Lang::get('app.exercise-destroyed'));
                    return Redirect::route('exercise.indexCourse', $course_id);
                } else {
                    return Redirect::route('exercise.view', $id);
                }
            } else {
                return Redirect::route('exercise.view', $id);
            }
        } else {
            Session::flash('message', Lang::get('common.no-such-site'));
            return Redirect::route('homepage');
        }
    }
    

}


 ?>
