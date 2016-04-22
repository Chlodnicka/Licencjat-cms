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
        $this->layout->content = View::make('exercise.index', array(
            'exercises' => $exercises,
        ));
    }

    public function indexExerciseByCourse($id)
    {
        $exercises = Course::with('exercises')->find($id)->exercises;
        $this->layout->content = View::make('exercise.index', array(
            'exercises' => $exercises
        ));
    }


    public function edit($id)
    {
        $exercise = Exercise::findOrFail($id);
        $this->layout->content = View::make('exercise.edit', array(
            'exercise' => $exercise,
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
        $exercise->lecture_id = Input::get('lecture');
        $exercise->course_id = Input::get('course');
        $exercise->save();

        return Redirect::route('exercise.view', $exercise->id);

    }

    public function newOne()
    {
        $this->layout->content = View::make('exercise.new');
    }

    public function create()
    {
        $exercise = new Exercise();
        $exercise->title = Input::get('title');
        $exercise->content = Input::get('content');
        $exercise->solution = Input::get('solution');
        $exercise->solution_access = Input::get('solution_access');
        $exercise->difficulty = Input::get('difficulty');
        $exercise->lecture_id = Input::get('lecture');
        $exercise->course_id = Input::get('course');
        $exercise->owner_id = 1;
        $exercise->owner_role_id = 1;

        $exercise->save();

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
        $exercise->delete();
        return Redirect::route('exercise.indexCourse', $course_id);
    }

}


 ?>
