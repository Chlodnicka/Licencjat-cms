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
        $tags = Tag::paginate(20);
        $this->layout->content = View::make('tag.index', array(
            'tags' => $tags,
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
        $tag = Tag::findOrFail($id);
        $this->layout->content = View::make('tag.edit', array(
            'tag' => $tag,
        ));
    }

    /**
     * New tag action.
     *
     * @return \Illuminate\View\View
     */
    public function newOne()
    {
        $this->layout->content = View::make('tag.new');
    }

    /**
     * Update tag action.
     *
     * @param $id Id of tag
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function update($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->name = Input::get('name');
        $rules = $tag->rules();
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return Redirect::route('tag.edit', $tag->id)
                ->withErrors($validator);
        } else {
            $tag->save();
            Session::flash('message', Lang::get('app.tag-updated'));
            return Redirect::route('tag.view', $tag->id);
        }
    }

    /**
     * Create tag action.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tag = new Tag();
        $tag->name = Input::get('name');
        $rules = $tag->rules();
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return Redirect::route('tag.new')
                ->withErrors($validator)
                ->withInput();
        } else {
            $tag->save();
            Session::flash('message', Lang::get('app.tag-crated'));
            return Redirect::route('tag.view', $tag->id);
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
        $tag = Tag::findOrFail($id);
        $this->layout->content = View::make('tag.delete', array(
            'tag' => $tag
        ));
    }

    /**
     * Destroy tag action.
     *
     * @param $id Id of tag
     * @return \Illuminate\View\View
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->courses()->detach();
        $tag->lectures()->detach();
        $tag->exercises()->detach();
        $tag->news()->detach();
        $tag->delete();
        Session::flash('message', Lang::get('app.tag-destroyed'));
        return Redirect::route('tag.index');
    }
}

 ?>
