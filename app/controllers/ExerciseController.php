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

    public function view()
    {
        $this->layout->content = View::make('exercise.view');
    }

    public function delete()
    {
        $this->layout->content = View::make('exercise.delete');
    }

}


 ?>
