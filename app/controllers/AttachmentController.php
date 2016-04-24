<?php

/**
 *
 */
class AttachmentController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $attachments = Attachment::all();
        $this->layout->content = View::make('attachment.index', array(
            'attachments' => $attachments
        ));
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
        $image = Input::file('image');

        $destinationPath = 'uploads/';
        $filename = $image->getClientOriginalName();
        $url = $destinationPath . $filename;

        $file = new Attachment();
        $file->url = $url;
        $file->name = $filename;


        Input::file('image')->move($destinationPath, $filename);
        $file->save();
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
