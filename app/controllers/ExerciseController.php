<?php



/**
 *
 */
class ExerciseController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $this->layout->content = View::make('exercise.index');
    }

    public function indexExerciseByCourse($id)
    {
        $exercises = Course::with('exercises')->find($id)->exercises;
        $this->layout->content = View::make('exercise.index', array(
            'exercises' => $exercises
        ));
    }


    public function edit()
    {
        $this->layout->content = View::make('exercise.edit');
    }

    public function newOne()
    {
        $this->layout->content = View::make('exercise.new');
    }

    public function create()
    {
        $this->layout->content = View::make('exercise.create');
    }

    public function view($id)
    {
        $exercise = Exercise::findOrFail($id);
        $this->layout->content = View::make('exercise.view', array(
            'exercise' => $exercise,
        ));
    }

    public function delete()
    {
        $this->layout->content = View::make('exercise.delete');
    }

}


 ?>
