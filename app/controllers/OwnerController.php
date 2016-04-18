<?php


/**
 *
 */

//use Model\Owner;

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
        $this->layout->content = View::make('owner.edit');
    }

    public function newOne()
    {
        $this->layout->content = View::make('owner.new');
    }

    public function create()
    {
        $this->layout->content = View::make('owner.create');
    }

}


 ?>
