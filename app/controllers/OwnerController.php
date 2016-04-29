<?php


/**
 *
 */

class OwnerController extends BaseController
{

    protected $layout = 'layouts.master';
    public function index()
    {
        $owner = Owner::find(1);
        $positions = $owner->position();
        $position = $positions[$owner->position];
        $this->layout->content = View::make('owner.index', array(
            'owner' => $owner,
            'position' => $position,
        ));

    }

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

    public function update()
    {
        $id = 1;
        $owner = Owner::findOrFail($id);
        $owner->firstname = Input::get('firstname');
        $owner->lastname = Input::get('lastname');
        $owner->email = Input::get('email');
        $owner->position = Input::get('position');
        $owner->phone = Input::get('phone');
        $owner->university = Input::get('university');
        $owner->tutorshipHours = Input::get('tutorshipHours');
        $owner->content = Input::get('content');
        $owner->institute = Input::get('institute');
        $owner->save();

        return Redirect::route('owner.index');
    }

}


 ?>
