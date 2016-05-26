<?php
/**
 * Tree controller.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class TreeController.
 *
 * @package Controller
 * @author Maja Chłodnicka
 */
class TreeController extends BaseController
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
            if ($role == 1) {
                $this->layout = 'layouts.masterlogin';
            }
        }
    }

    /**
     * Index trees action.
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
                $tree = Tree::all();
                $this->layout->content = View::make('tree.index', array(
                    'tree' => $tree,
                ));
            } else {
                return Redirect::route('homepage');
            }
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Show tree action.
     *
     * @param $id Id of tree
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if ($role == 1) {
                $tree = Tree::findOrFail($id);
                $this->layout->content = View::make('tree.' . $tree->name, array(
                    'tree' => $tree,
                ));
            } else {
                return Redirect::route('homepage');
            }
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Edit tree action.
     *
     * @param $id Id of tree
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if ($role == 1) {
                $tree = Tree::findOrFail($id);
                $tree->active = Input::get('active');
                $tree->lead = Input::get('lead');
                $tree->title = Input::get('name');

                $rules = $tree->rules();
                $validator = Validator::make(Input::all(), $rules);

                if ($validator->fails()) {
                    return Redirect::route('tree' . $tree->name, $tree->id)->withErrors($validator);
                } else {
                    $tree->save();
                    Session::flash('message', Lang::get('common.data-saved'));
                    return Redirect::route('tree.' . $tree->name, $tree->id);
                }

            } else {
                return Redirect::route('homepage');
            }
        } else {
            return Redirect::route('homepage');
        }

    }
}

?>
