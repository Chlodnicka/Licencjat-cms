<?php
/**
 * Tree controller.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class TreeController.
 *
 * @package Controller
 * @author Maja Chłodnicka
 */
class TreeController extends BaseController
{
    /**
     * @param $layout Base layout
     */
    protected $layout = 'layouts.master';

    /**
     * Index trees action.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tree = Tree::all();
        $this->layout->content = View::make('tree.index', array(
            'tree' => $tree,
        ));
    }

    /**
     * Show tree action.
     *
     * @param $id Id of tree
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $tree = Tree::findOrFail($id);
        $this->layout->content = View::make('tree.'.$tree->name, array(
            'tree' => $tree,
        ));
    }

    /**
     * Edit tree action.
     *
     * @param $id Id of tree
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $tree = Tree::findOrFail($id);
        $tree->active = Input::get('active');
        $tree->lead = Input::get('lead');
        $tree->save();
        Session::flash('message', 'OK');
        return Redirect::route('tree.'.$tree->name, $tree->id);
    }

}


?>
