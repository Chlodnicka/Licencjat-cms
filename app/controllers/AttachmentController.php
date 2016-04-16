<?php

/**
 *
 */
class AttachmentController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $this->layout->content = View::make('attachment.index');
    }

    public function edit()
    {
        $this->layout->content = View::make('attachment.edit');
    }

    public function newOne()
    {
        $this->layout->content = View::make('attachment.new');
    }

    public function create()
    {
        $this->layout->content = View::make('attachment.create');
    }

    public function view()
    {
        $this->layout->content = View::make('attachment.view');
    }

    public function delete()
    {
        $this->layout->content = View::make('attachment.delete');
    }

}


 ?>
