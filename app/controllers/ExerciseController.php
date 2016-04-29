<?php



/**
 *
 */
class ExerciseController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $exercises = Exercise::all();
        $exercise_difficulty = new Exercise();
        $difficulty = $exercise_difficulty->difficulty();
        $this->layout->content = View::make('exercise.index', array(
            'exercises' => $exercises,
            'difficulty' => $difficulty,
        ));
    }

    public function indexExerciseByCourse($id)
    {
        $exercises = Course::with('exercises')->find($id)->exercises;
        $exercise_difficulty = new Exercise();
        $difficulty = $exercise_difficulty->difficulty();
        $this->layout->content = View::make('exercise.index', array(
            'exercises' => $exercises,
            'difficulty' => $difficulty,
        ));
    }

    public function search()
    {
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
        ));
    }

    public function indexExerciseByLecture($id)
    {
        $exercises = Lecture::with('exercises')->find($id)->exercises;
        $exercise_difficulty = new Exercise();
        $difficulty = $exercise_difficulty->difficulty();
        $this->layout->content = View::make('exercise.index', array(
            'exercises' => $exercises,
            'difficulty' => $difficulty,
        ));
    }

    public function indexExerciseByDifficulty($id)
    {
        $exercises = DB::table('exercises')->where('difficulty', '=', $id)->get();
        $exercise_difficulty = new Exercise();
        $difficulty = $exercise_difficulty->difficulty();
        $this->layout->content = View::make('exercise.index', array(
            'exercises' => $exercises,
            'difficulty' => $difficulty,
        ));
    }

    public function edit($id)
    {
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
    }

    public function update($id)
    {
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

        return Redirect::route('exercise.view', $exercise->id);

    }

    public function newOne()
    {
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
    }

    public function create()
    {
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

        return Redirect::route('exercise.view', $exercise->id);
    }

    public function view($id)
    {
        $exercise = Exercise::findOrFail($id);
        $this->layout->content = View::make('exercise.view', array(
            'exercise' => $exercise,
        ));
    }

    public function delete($id)
    {
        $exercise = Exercise::findOrFail($id);
        $this->layout->content = View::make('exercise.delete', array(
            'exercise' => $exercise,
        ));
    }

    public function destroy($id) {
        $exercise = Exercise::findOrFail($id);
        $course_id = $exercise->course->id;
        $exercise->tags()->detach();
        $exercise->delete();
        return Redirect::route('exercise.indexCourse', $course_id);
    }

}


 ?>
