<?php
/**
 * Tag controller.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class TagController.
 *
 * @package Controller
 * @author Maja Chłodnicka
 */
class TagController extends BaseController
{
    /**
     * @param $layout Base layout
     */
    protected $layout = 'layouts.master';

    /**
     * Index tags action.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if ($role == 1) {
                $actions = 1;
            } else {
                $actions = 0;
            }
        } else {
            $actions = 0;
        }
        $tags = Tag::paginate(20);
        $this->layout->content = View::make('tag.index', array(
            'tags' => $tags,
            'actions' => $actions,
        ));
    }

    /**
     * Edit tag action.
     *
     * @param $id Id of tag
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if ($role == 1) {
                $tag = Tag::findOrFail($id);
                $this->layout->content = View::make('tag.edit', array(
                    'tag' => $tag,
                ));
            } else {
                return Redirect::route('tag.view', $id);
            }
        } else {
            return Redirect::route('tag.view', $id);
        }
    }

    /**
     * New tag action.
     *
     * @return \Illuminate\View\View
     */
    public function newOne()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if ($role == 1) {
                $this->layout->content = View::make('tag.new');
            } else {
                return Redirect::route('tag.index');
            }
        } else {
            return Redirect::route('tag.index');
        }
    }

    /**
     * Update tag action.
     *
     * @param $id Id of tag
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function update($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if ($role == 1) {
                $tag = Tag::findOrFail($id);
                $tag->name = Input::get('name');
                $rules = $tag->rules();
                $validator = Validator::make(Input::all(), $rules);

                if ($validator->fails()) {
                    return Redirect::route('tag.edit', $tag->id)
                        ->withErrors($validator);
                } else {
                    $tag->save();
                    Session::flash('message', Lang::get('app.tag-updated'));
                    return Redirect::route('tag.view', $tag->id);
                }
            } else {
                return Redirect::route('tag.view', $id);
            }
        } else {
            return Redirect::route('tag.view', $id);
        }
    }

    /**
     * Create tag action.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if ($role == 1) {
                $tag = new Tag();
                $tag->name = Input::get('name');
                $rules = $tag->rules();
                $validator = Validator::make(Input::all(), $rules);

                if ($validator->fails()) {
                    return Redirect::route('tag.new')
                        ->withErrors($validator)
                        ->withInput();
                } else {
                    $tag->save();
                    Session::flash('message', Lang::get('app.tag-crated'));
                    return Redirect::route('tag.view', $tag->id);
                }
            } else {
                return Redirect::route('tag.index');
            }
        } else {
            return Redirect::route('tag.index');
        }
    }

    /**
     * View tag action.
     *
     * @param $id Id of tag
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if ($role == 1) {
                $actions = 1;
            } else {
                $actions = 0;
            }
        } else {
            $actions = 0;
        }
        $tag = Tag::findOrFail($id);
        //$courses = $tag->courses();
        $courses = Tag::find($id)->courses()->orderBy('name')->get();
        $exercises = Tag::find($id)->exercises()->orderBy('title')->get();
        $lectures = Tag::find($id)->lectures()->orderBy('title')->get();
        $news = Tag::find($id)->news()->orderBy('title')->get();
        $this->layout->content = View::make('tag.view', array(
            'tag' => $tag,
            'courses' => $courses,
            'exercises' => $exercises,
            'lectures' => $lectures,
            'news' => $news,
            'actions' => $actions,
        ));
    }

    /**
     * Delete tag action.
     *
     * @param $id Id of tag
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if ($role == 1) {
                $tag = Tag::findOrFail($id);
                $this->layout->content = View::make('tag.delete', array(
                    'tag' => $tag
                ));
            } else {
                return Redirect::route('tag.view', $id);
            }
        } else {
            return Redirect::route('tag.view', $id);
        }
    }

    /**
     * Destroy tag action.
     *
     * @param $id Id of tag
     * @return \Illuminate\View\View
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if ($role == 1) {
                $tag = Tag::findOrFail($id);
                $tag->courses()->detach();
                $tag->lectures()->detach();
                $tag->exercises()->detach();
                $tag->news()->detach();
                $tag->delete();
                Session::flash('message', Lang::get('app.tag-destroyed'));
                return Redirect::route('tag.index');
            } else {
                return Redirect::route('tag.view', $id);
            }
        } else {
            return Redirect::route('tag.view', $id);
        }
    }
}

 ?>
