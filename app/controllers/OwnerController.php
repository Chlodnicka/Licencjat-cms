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
        $this->layout->content = View::make('owner.index', array('owner' => $owner));

    }

    public function edit()
    {
        $id = 1;
        $owner = Owner::findOrFail($id);
        $this->layout->content = View::make('owner.edit', array (
            'owner' => $owner,
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
        $owner->tutorshipHours = Input::get('tutorshipHours');
        $owner->content = Input::get('content');
        $owner->institute = Input::get('institute');
        $owner->save();

        return Redirect::route('owner.index');
    }

}


 ?>
