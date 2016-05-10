<?php


/**
 *
 */
class TagController extends BaseController
{
    protected $layout = 'layouts.master';
    public function index()
    {
        $tags = Tag::all();
        $this->layout->content = View::make('tag.index', array(
            'tags' => $tags,
        ));
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        $this->layout->content = View::make('tag.edit', array(
            'tag' => $tag,
        ));
    }

    public function newOne()
    {
        $this->layout->content = View::make('tag.new');
    }

    public function update($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->name = Input::get('name');
        $tag->save();
        Session::flash('message', Lang::get('app.tag-updated'));
        return Redirect::route('tag.view', $tag->id);
    }

    public function create()
    {
        $tag = new Tag();
        $tag->name = Input::get('name');
        $tag->save();
        Session::flash('message', Lang::get('app.tag-created'));
        return Redirect::route('tag.view', $tag->id);
    }

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

    public function delete($id)
    {
        $tag = Tag::findOrFail($id);
        $this->layout->content = View::make('tag.delete', array(
            'tag' => $tag
        ));
    }

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
