<?php
/**
 * Owner controller.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class OwnerController.
 *
 * @package Controller
 * @author Maja Chłodnicka
 */
class OwnerController extends BaseController
{

    /**
     * @param $layout Base layout
     */
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

    /**
     * Index Owner action.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tree = Tree::findOrFail(1);
        if ( $tree->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $actions = 1;
                } else {
                    $actions = 0;
                }
            } else {
                $actions = 0;
            }
            $owner = Owner::find(1);
            $positions = $owner->position();
            $position = $positions[$owner->position];
            $attachment = DB::table('attachments')->where('id', '=', $owner->attachment_id)->get();
            $this->layout->content = View::make('owner.index', array(
                'owner' => $owner,
                'position' => $position,
                'actions' => $actions,
                'attachment' => $attachment,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Edit Owner action.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if($role == 1) {
                $id = 1;
                $owner = Owner::findOrFail($id);
                $positions = $owner->position();
                $this->layout->content = View::make('owner.edit', array (
                    'owner' => $owner,
                    'positions' => $positions,
                ));
            } else {
                return Redirect::route('owner.index');
            }
        } else {
            return Redirect::route('owner.index');
        }
    }

    /**
     * Update Owner action.
     *
     * @return \Illuminate\View\View
     */
    public function update()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if($role == 1) {
                $id = 1;

                $owner = Owner::findOrFail($id);
                $rules = $owner->rules();

                $owner->firstname = Input::get('firstname');
                $owner->lastname = Input::get('lastname');
                $owner->email = Input::get('email');
                $owner->position = Input::get('position');
                $owner->phone = Input::get('phone');
                $owner->university = Input::get('university');
                $owner->tutorshipHours = Input::get('tutorshipHours');
                $owner->content = Input::get('content');
                $owner->institute = Input::get('institute');
                $owner->department = Input::get('department');

                $validator = Validator::make(Input::all(), $rules);

                if ($validator->fails())
                {
                    return Redirect::route('owner.edit')->withErrors($validator);
                } else {
                    $image = Input::file('image');
                    $img_set = Input::get('img-isset');
                    var_dump($image);
                    var_dump($img_set);
                    if($image !== NULL && $img_set == 1) {
                        $destinationPath = 'uploads/';
                        $extension = $image->getClientOriginalName();
                        $comma = strpos($extension, '.');
                        $extension = substr($extension, $comma);
                        $filename = Str::random(60) . $extension;
                        $url = $destinationPath . $filename;

                        $file = new Attachment();
                        $file->url = $url;
                        $file->name = $filename;
                        $file->description = Input::get('img-description');
                        $file->title = Input::get('img-title');


                        Input::file('image')->move($destinationPath, $filename);

                        $file->save();
                        $owner->attachment_id = $file->id;
                    }
                    if($img_set != 1) {
                        $owner->attachment_id = NULL;
                    }
                    $owner->save();
                    Session::flash('message', Lang::get('app.owner-updated'));
                    $tree = Tree::findOrFail(1);
                    if ( $tree->active == 1) {
                        return Redirect::route('owner.index');
                    } else {
                        return Redirect::route('owner.edit');
                    }
                }
            } else {
                return Redirect::route('owner.index');
            }
        } else {
            return Redirect::route('owner.index');
        }

    }

}


 ?>
