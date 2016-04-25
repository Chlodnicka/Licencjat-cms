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
        $file->description = Input::get('description');
        $file->title = Input::get('title');

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
        $file->description = Input::get('description');
        $file->title = Input::get('title');


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

    public function delete($id)
    {
        $attachment = Attachment::findOrFail($id);
        $this->layout->content = View::make('attachment.delete', array(
            'attachment' => $attachment
        ));
    }

    public function destroy($id)
    {
        $attachment = Attachment::findOrFail($id);
        $attachment->courses()->detach();
        $attachment->lectures()->detach();
        $attachment->exercises()->detach();
        $attachment->news()->detach();
        $attachment->delete();
        return Redirect::route('attachment.index');
    }

}


 ?>
