<?php
/**
* Class UserController.
*
* @package Controller
* @author Maja Chłodnicka
*/
class UserController extends BaseController
{
    /**
     * @param $layout Base layout
     */
    protected $layout = 'layouts.master';

    public function __construct() {
        $this->beforeFilter('csrf', array('on'=>'post'));
    }

    public function showLogin()
    {
        $tree = Tree::findOrFail(2);
        if($tree->active == 1){
            $this->layout->content = View::make('user.login');
        } else {
            return Redirect::route('homepage');
        }
    }

    public function showRegister()
    {
        $tree = Tree::findOrFail(2);
        if($tree->active == 1){
            $this->layout->content = View::make('user.register');
        } else {
            return Redirect::route('homepage');
        }
    }

    public function doLogin()
    {
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {

            $userdata = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
            );

            if (Auth::attempt($userdata)) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                $role = $user->role_id;
                $tree = Tree::findOrFail(2);

                if($tree->active != 1 && $role == 2) {
                    Redirect::route('user.logout');
                }
            } else {
                return Redirect::to('login');
            }

        }
    }

    public function doLogout()
    {
        Auth::logout();
        return Redirect::to('login');
    }

    public function doRegister() {
        $rules = array(
            'name'=>'required|alpha|min:2',
            'username'=>'required|alpha|min:2',
            'email'=>'required|email|unique:users',
            'password'=>'required|alpha_num|between:6,12|confirmed',
            'password_confirmation'=>'required|alpha_num|between:6,12'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route('user.register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        } else {
            $user = new User;
            $user->name = Input::get('name');
            $user->username = Input::get('username');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->role_id = 2;
            $user->save();

            return Redirect::route('user.login')->with('message', 'Thanks for registering!');
        }
    }
}