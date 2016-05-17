<?php
/**
 * Owner controller.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class OwnerController.
 *
 * @package Controller
 * @author Maja Chłodnicka
 */
class OwnerController extends BaseController
{

    /**
     * @param $layout Base layout
     */
    protected $layout = 'layouts.master';

    /**
     * Index Owner action.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tree = Tree::findOrFail(1);
        if ( $tree->active == 1) {
            $owner = Owner::find(1);
            $positions = $owner->position();
            $position = $positions[$owner->position];
            $this->layout->content = View::make('owner.index', array(
                'owner' => $owner,
                'position' => $position,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Edit Owner action.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $id = 1;
        $owner = Owner::findOrFail($id);
        $positions = $owner->position();
        $this->layout->content = View::make('owner.edit', array (
            'owner' => $owner,
            'positions' => $positions,
        ));
    }

    /**
     * Update Owner action.
     *
     * @return \Illuminate\View\View
     */
    public function update()
    {
        $id = 1;

        $owner = Owner::findOrFail($id);
        $rules = $owner->rules();
        
        $owner->firstname = Input::get('firstname');
        $owner->lastname = Input::get('lastname');
        $owner->email = Input::get('email');
        $owner->position = Input::get('position');
        $owner->phone = Input::get('phone');
        $owner->university = Input::get('university');
        $owner->tutorshipHours = Input::get('tutorshipHours');
        $owner->content = Input::get('content');
        $owner->institute = Input::get('institute');

        $validator = Validator::make(Input::all(), $rules);
        
        if ($validator->fails())
        {
            return Redirect::route('owner.edit')->withErrors($validator);
        } else {
            $owner->save();
            Session::flash('message', Lang::get('app.owner-updated'));
            $tree = Tree::findOrFail(1);
            if ( $tree->active == 1) {
                return Redirect::route('owner.index');
            } else {
                return Redirect::route('owner.edit');
            }
        }

    }

}


 ?>
