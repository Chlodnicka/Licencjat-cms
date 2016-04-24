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

    public function edit($id)
    {
        $attachment = Attachment::findOrFail($id);
        $this->layout->content = View::make('attachment.edit', array(
            'attachment' => $attachment,
        ));
    }

    public function newOne()
    {
        $this->layout->content = View::make('attachment.new');
    }

    public function update($id)
    {
        //do ogarnięcia 
        $file = Attachment::findOrFail($id);
        $image = Input::file('image');
        $destinationPath = 'uploads/';
        $filename = $image->getClientOriginalName();
        $url = $destinationPath . $filename;

        $file->url = $url;
        $file->name = $filename;


        Input::file('image')->move($destinationPath, $filename);
        $file->save();
        return Redirect::route('attachment.view', $file->id);
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
        return Redirect::route('attachment.view', $file->id);
    }

    public function view($id)
    {
        $attachment = Attachment::findOrFail($id);
        $this->layout->content = View::make('attachment.view', array(
            'attachment' => $attachment,
        ));
    }

    public function delete()
    {
        $this->layout->content = View::make('attachment.delete');
    }

}


 ?>
