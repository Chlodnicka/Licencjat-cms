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
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $role = $user->role_id;
            if($role == 1) {
                $this->layout = 'layouts.masterlogin';
            }
        }
    }


    public function showLogin()
    {
            $this->layout->content = View::make('user.login');
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
                    return Redirect::route('user.logout');
                }
                if($role == 1) {
                    return Redirect::route('dashboard');
                } elseif ($role == 2) {
                    return Redirect::route('student.index');
                }
            } else {
                return Redirect::route('user.login');
            }

        }
    }

    public function doLogout()
    {
        Auth::logout();
        return Redirect::to('login');
    }

    public function doRegister() {
        $tree = Tree::findOrFail(2);
        if($tree->active == 1){
            $rules = array(
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
                $user->username = Input::get('username');
                $user->email = Input::get('email');
                $user->password = Hash::make(Input::get('password'));
                $user->role_id = 2;
                $user->save();

                $student = new Student();
                $student->email = Input::get('email');
                $student->role_id = 2;
                $student->owner_id = 1;
                $student->owner_role_id = 1;
                $student->users_id = $user->id;

                $student->save();

                return Redirect::route('user.login')->with('message', 'Thanks for registering!');
            }
        } else {
            return Redirect::route('homepage');
        }
    }

    public function passwordChange(){
        if (Auth::check()) {
            $this->layout->content = View::make('user.password');
        } else {
            return Redirect::route('user.login');
        }
    }

    public function postPasswordChange(){
        if (Auth::check()) {
            $rules = array(
                'password' => 'required|alpha_num|between:6,12',
                'new_password' => 'required|alpha_num|between:6,12|confirmed',
                'new_password_confirmation' => 'required|alpha_num|between:6,12'
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->passes()) {
                $userId = Auth::user()->id;
                $user = User::findOrFail($userId);
                if(Hash::check(Input::get('password'), $user->password)){
                    $user->password = Hash::make(Input::get('new_password'));
                    $user->save();
                    return Redirect::route('user.change_password');
                } else {
                    return Redirect::route('user.change_password')->with('message', 'Bad old password');
                }

            } else {
                return Redirect::route('user.change_password')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
            }
        } else {
            return Redirect::route('user.login');
        }
    }
}