<?php

/**
 *
 */
class OwnerController extends BaseController
{
    /**
    * Routing settings
    */



    protected $layout = 'layouts.master';
    public function index()
    {
        $this->layout->content = View::make('owner.index');
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
