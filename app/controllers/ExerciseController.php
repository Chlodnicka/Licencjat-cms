<?php



/**
 *
 */
class ExerciseController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            $exercises = Exercise::all();
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

    public function indexExerciseByCourse($id)
    {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            $exercises = Course::with('exercises')->find($id)->exercises;
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
            $exercises = DB::table('exercises')->join('exercise_tag', 'exercises.id', '=', 'exercise_tag.exercise_id')->where('solution_access', '=', $searchParams['solution'])->where('difficulty', '=', $searchParams['difficulty'])->where('content', 'LIKE', '%' . $searchParams['content'] . '%')->get();
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

    public function indexExerciseByLecture($id)
    {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            $exercise_lead = Tree::findOrFail(6);
            $exercises = Lecture::with('exercises')->find($id)->exercises;
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

    public function indexExerciseByDifficulty($id)
    {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            $exercise_lead = Tree::findOrFail(6);
            $exercises = DB::table('exercises')->where('difficulty', '=', $id)->get();
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

    public function edit($id)
    {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            $exercise = Exercise::findOrFail($id);
            $courses = Course::all()->lists('name', 'id');
            $lectures = Lecture::all()->lists('title', 'id');
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
            $exercise->save();

            $exercise->tags()->sync(Input::get('tags'));

            $tree_students = Tree::findOrFail(2);
            $action = 'update';
            if( $tree_students->active == 1) {
                $exercise->sendMail($exercise->course_id, $action);
            }

            return Redirect::route('exercise.view', $exercise->id);
        } else {
            return Redirect::route('homepage');
        }
    }

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

            $exercise->save();

            $exercise->tags()->sync(Input::get('tags'));

            $tree_students = Tree::findOrFail(2);
            $action = 'new';
            if( $tree_students->active == 1) {
                $exercise->sendMail($exercise->course_id, $action);
            }
            return Redirect::route('exercise.view', $exercise->id);
        } else {
            return Redirect::route('homepage');
        }
    }

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

    public function destroy($id) {
        $tree = Tree::findOrFail(3);
        $tree_exercise = Tree::findOrFail(6);
        if ( $tree->active == 1 && $tree_exercise->active == 1) {
            $exercise = Exercise::findOrFail($id);
            $course_id = $exercise->course->id;
            $exercise->tags()->detach();
            $exercise->delete();
            return Redirect::route('exercise.indexCourse', $course_id);
        } else {
            return Redirect::route('homepage');
        }
    }

}


 ?>
