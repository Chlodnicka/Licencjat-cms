<?php

/**
 *
 */
class AttachmentController extends BaseController
{
    protected $layout = 'layouts.master';

    public function __construct()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if($role == 1) {
                $this->layout = 'layouts.masterlogin';
            }
        }
    }

    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if($role == 1) {
                $attachments = Attachment::all();
                $this->layout->content = View::make('attachment.index', array(
                    'attachments' => $attachments
                ));
            } else {
                return Redirect::route('homepage');
            }
        } else {
            return Redirect::route('homepage');
        }
    }

    public function edit($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if($role == 1) {
                $attachment = Attachment::findOrFail($id);
                $this->layout->content = View::make('attachment.edit', array(
                    'attachment' => $attachment,
                ));
            } else {
                return Redirect::route('attachment.view', $id);
            }
        } else {
            return Redirect::route('attachment.view', $id);
        }
    }

    public function newOne()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if($role == 1) {
                $this->layout->content = View::make('attachment.new');
            } else {
                return Redirect::route('attachment.index');
            }
        } else {
            return Redirect::route('attachment.index');
        }
    }

    public function update($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if($role == 1) {
                //do ogarnięcia
                $file = Attachment::findOrFail($id);
                $file->description = Input::get('description');
                $file->title = Input::get('title');

                $file->save();
                return Redirect::route('attachment.view', $file->id);
            } else {
                return Redirect::route('attachment.view', $id);
            }
        } else {
            return Redirect::route('attachment.view', $id);
        }
    }

    public function create()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if($role == 1) {
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
            } else {
                return Redirect::route('attachment.index');
            }
        } else {
            return Redirect::route('attachment.index');
        }
    }

    public function view($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if($role == 1) {
                $attachment = Attachment::findOrFail($id);
                $this->layout->content = View::make('attachment.view', array(
                    'attachment' => $attachment,
                ));
            } else {
                return Redirect::route('attachment.index');
            }
        } else {
            return Redirect::route('attachment.index');
        }
    }

    public function delete($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if($role == 1) {
                $attachment = Attachment::findOrFail($id);
                $this->layout->content = View::make('attachment.delete', array(
                    'attachment' => $attachment
                ));
            } else {
                return Redirect::route('attachment.view', $id);
            }
        } else {
            return Redirect::route('attachment.view', $id);
        }
    }

    public function destroy($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if ($role == 1) {
                $attachment = Attachment::findOrFail($id);
                $attachment->courses()->detach();
                $attachment->lectures()->detach();
                $attachment->exercises()->detach();
                $attachment->news()->detach();
                $attachment->delete();
                return Redirect::route('attachment.index');
            } else {
                return Redirect::route('attachment.view', $id);
            }
        } else {
            return Redirect::route('attachment.view', $id);
        }
    }

}


 ?>
