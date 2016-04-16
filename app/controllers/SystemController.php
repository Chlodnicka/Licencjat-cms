<?php

/**
 *
 */
class SystemController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $this->layout->content = View::make('system.index');
    }

    public function newOwner() {
      $this->layout->content = View::make('owner.new');
      //return View::make('owner');
    }
}


 ?>
