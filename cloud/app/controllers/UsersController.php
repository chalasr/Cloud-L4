<?php

class UsersController extends BaseController {
    protected $layout = "layouts.unlogged";

    public function __construct(){
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('auth', array('only'=>array('getDashboard')));
    }

	public function getRegister() {
        if(Auth::check()){ return Redirect::to('/')->with('message', 'Vous ne pouvez pas vous inscrire en étant déjà connecté');}
	    $this->layout->content = View::make('users.inscription');
	}

	public function postCreate() {
    	$validator = Validator::make(Input::all(), User::$rules);
		if($validator->passes()) {
		    $user = new User;
		    $user->username = Input::get('username');
		    $user->password = Hash::make(Input::get('password'));
            $user->firstname = Input::get('firstname');
            $user->lastname = Input::get('lastname');
            $user->email = Input::get('email');
		    $user->birthday = Input::get('birthday');
		    $user->save();
		    return Redirect::to('users/login')->with('message', 'Vous êtes désormais inscris !!');
		}else{
		    return Redirect::to('users/register')->with('message', 'Veuillez corriger les erreurs suivantes')->withErrors($validator)->withInput();
		}
	}

	public function getLogin() {
        if(Auth::check()){ return Redirect::to('/')->with('message', 'Vous êtes déjà connecté');}
	    $this->layout->content = View::make('users.login');
	}

	public function postSignin(){
		if(Auth::attempt(array('username'=>Input::get('username'), 'password'=>Input::get('password')))) {
            if(Auth::user()->role_id == 0){
                Auth::logout();
                return Redirect::to('users/login')->with('message', 'Votre compte a été bloqué !')->withInput();
            }
    	    return Redirect::to('/')->with('message', 'Vous êtes connecté !');
		}else{
    		return Redirect::to('users/login')
	        ->with('message', 'Votre username/password est incorrect !')
	        ->withInput();
		}
	}

	public function getDashboard() {
    	return View::make('users.dashboard');
	}

	public function getLogout() {
    	Auth::logout();
    	return Redirect::to('users/login')->with('message', 'Vous êtes déconnecté !');
	}
}