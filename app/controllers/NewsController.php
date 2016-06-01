<?php
/**
 * News controller.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class NewsController.
 *
 * @package Controller
 * @author Maja Chłodnicka
 */
class NewsController extends BaseController
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
     * Index news action.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tree = Tree::findOrFail(4);
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
            $news = News::paginate(6);
            $news_lead = Tree::findOrFail(4);
            $this->layout->content = View::make('news.index', array(
                'news' => $news,
                'news_lead' => $news_lead,
                'actions' => $actions,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Index news by courses action.
     *
     * @param $id Id of course
     * @return \Illuminate\View\View
     */
    public function indexByCourses($id)
    {
        $tree = Tree::findOrFail(4);
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
            $news = DB::table('news')->where('course_id', "=", $id)->paginate(6);
            $news_lead = Tree::findOrFail(4);
            $this->layout->content = View::make('news.index', array(
                'news' => $news,
                'news_lead' => $news_lead,
                'actions' => $actions,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Edit news item action.
     *
     * @param $id Id of news item
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $tree = Tree::findOrFail(4);
        if ( $tree->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {

                    $news = News::findOrFail($id);
                    $courses = Course::all()->lists('name', 'id');
                    $tags = Tag::all()->lists('name','id');
                    $news_tags = $news->tags()->lists('tag_id');
                    $this->layout->content = View::make('news.edit', array(
                        'news' => $news,
                        'courses' => $courses,
                        'tags' => $tags,
                        'news_tags' => $news_tags,
                    ));
                } else {
                    return Redirect::route('news.view', $id);
                }
            } else {
                return Redirect::route('news.view', $id);
            }
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * New news item action.
     *
     * @return \Illuminate\View\View
     */
    public function newOne()
    {
        $tree = Tree::findOrFail(4);
        if ( $tree->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $courses = Course::all()->lists('name', 'id');
                    $tags = Tag::all()->lists('name', 'id');
                    $this->layout->content = View::make('news.new', array(
                        'courses' => $courses,
                        'tags' => $tags
                    ));
                } else {
                    return Redirect::route('news.index');
                }
            } else {
                return Redirect::route('news.index');
            }
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Update news item action.
     *
     * @param $id Id of news item
     * @return \Illuminate\View\View
     */
    public function update($id)
    {
        $tree = Tree::findOrFail(4);
        if ( $tree->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $news = News::findOrFail($id);
                    $news->title = Input::get('title');
                    $news->lead = Input::get('lead');
                    $news->date = Input::get('date');
                    $news->content = Input::get('content');
                    $news->course_id = Input::get('courses');

                    $rules = $news->rules();
                    $validator = Validator::make(Input::all(), $rules);

                    if ($validator->fails())
                    {
                        return Redirect::route('news.edit', $news->id)->withErrors($validator);
                    } else {
                        if(Input::file('image') != NULL) {
                            $image = Input::file('image');

                            $destinationPath = 'uploads/';
                            $filename = $image->getClientOriginalName();
                            $url = $destinationPath . $filename;

                            $file = new Attachment();
                            $file->url = $url;
                            $file->name = $filename;
                            $file->description = Input::get('img-description');
                            $file->title = Input::get('img-title');


                            Input::file('image')->move($destinationPath, $filename);

                            $file->save();
                            $news->attachment_id = $file->id;
                        }
                        $news->save();
                        if(Input::get('tags') != NULL){
                            $news->tags()->sync(Input::get('tags'));
                        }
                        $tree_students = Tree::findOrFail(2);
                        $action = 'update';
                        if( $tree_students->active == 1) {
                            $news->sendMail($news->course_id, $action);
                        }
                        Session::flash('message', Lang::get('app.news-updated'));
                        return Redirect::route('news.view', $news->id);
                    }
                } else {
                    return Redirect::route('news.view', $id);
                }
            } else {
                return Redirect::route('news.view', $id);
            }
        } else {
            Session::flash('message', Lang::get('common.no-such-site'));
            return Redirect::route('homepage');
        }
    }

    /**
     * Create news item action.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tree = Tree::findOrFail(4);
        if ( $tree->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $news = new News();
                    $news->title = Input::get('title');
                    $news->lead = Input::get('lead');
                    $news->date = Input::get('date');
                    $news->content = Input::get('content');
                    $news->course_id = Input::get('courses');
                    $news->owner_id = 1;
                    $news->owner_role_id = 1;

                    $rules = $news->rules();
                    $validator = Validator::make(Input::all(), $rules);

                    if ($validator->fails())
                    {
                        return Redirect::route('news.new')
                            ->withErrors($validator)
                            ->withInput();
                    } else {
                        if(Input::file('image') != NULL) {
                            $image = Input::file('image');

                            $destinationPath = 'uploads/';
                            $filename = $image->getClientOriginalName();
                            $url = $destinationPath . $filename;

                            $file = new Attachment();
                            $file->url = $url;
                            $file->name = $filename;
                            $file->description = Input::get('img-description');
                            $file->title = Input::get('img-title');


                            Input::file('image')->move($destinationPath, $filename);

                            $file->save();
                            $news->attachment_id = $file->id;
                        }
                        $news->save();
                        if(Input::get('tags') != NULL){
                            $news->tags()->sync(Input::get('tags'));
                        }
                        $tree_students = Tree::findOrFail(2);
                        $action = 'update';
                        if( $tree_students->active == 1) {
                            $news->sendMail($news->course_id, $action);
                        }
                        Session::flash('message', Lang::get('app.news-created'));
                        return Redirect::route('news.view', $news->id);
                    }
                } else {
                    return Redirect::route('news.index');
                }
            } else {
                return Redirect::route('news.index');
            }
        } else {
            Session::flash('message', Lang::get('common.no-such-site'));
            return Redirect::route('homepage');
        }
    }

    /**
     * View news item action.
     *
     * @param $id Id of news item
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        $tree = Tree::findOrFail(4);
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
            $news = News::findOrFail($id);
            $attachments = $news->attachment();
            $this->layout->content = View::make('news.view',array(
                'news' => $news,
                'actions' => $actions,
                'attachments' => $attachments,
            ));
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Delete news item action.
     *
     * @param $id Id of news item
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        $tree = Tree::findOrFail(4);
        if ( $tree->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $news = News::findOrFail($id);
                    $this->layout->content = View::make('news.delete', array(
                        'news' => $news,
                    ));
                } else {
                    return Redirect::route('news.view', $id);
                }
            } else {
                return Redirect::route('news.view', $id);
            }
        } else {
            return Redirect::route('homepage');
        }
    }

    /**
     * Destroy news item action.
     *
     * @param $id Id of news item
     * @return \Illuminate\View\View
     */
    public function destroy($id)
    {
        $tree = Tree::findOrFail(4);
        if ( $tree->active == 1) {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                if($role == 1) {
                    $news = News::findOrFail($id);
                    $news->tags()->detach();
                    $news->delete();
                    Session::flash('message', Lang::get('app.news-destroyed'));
                    return Redirect::route('news.index');
                } else {
                    return Redirect::route('news.view', $id);
                }
            } else {
                return Redirect::route('news.view', $id);
            }
        } else {
            Session::flash('message', Lang::get('common.no-such-site'));
            return Redirect::route('homepage');
        }
    }


}


 ?>
