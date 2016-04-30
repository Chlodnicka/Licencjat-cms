<?php


/**
 *
 */
class TreeController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $tree = Tree::all();
        $this->layout->content = View::make('tree.index', array(
            'tree' => $tree,
        ));
    }

    public function show($id)
    {
        $tree = Tree::findOrFail($id);
        $this->layout->content = View::make('tree.'.$tree->name, array(
            'tree' => $tree,
        ));
    }

    public function edit($id)
    {
        $tree = Tree::findOrFail($id);
        $tree->active = Input::get('active');
        $tree->lead = Input::get('lead');
        $tree->save();

        return Redirect::route('tree.'.$tree->name, $tree->id);
    }

}


?>
