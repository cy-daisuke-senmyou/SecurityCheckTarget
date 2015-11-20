<?php
use \Model\User;

class Controller_Passwdchange extends Controller
{
	public function action_index() {
		if(Auth::check()) {
			// ログイン後
			return View::forge('passwdchange/login_success');
		} else {
			// ログイン前
			return View::forge('passwdchange/login');
		}
	}

	public function action_login() {
		$username = Input::post('username');
		$password = Input::post('password');

		$auth = Auth::instance();
		if($auth->login($username, $password)) {
			// ログイン成功
			Session::set('username', $username);
			return View::forge('passwdchange/login_success');
		} else {
			// ログイン失敗
			return View::forge('passwdchange/login_failure');
		}
	}

	public function action_logout() {
		$auth = Auth::instance();
		if($auth->logout()) {
			return View::forge('passwdchange/logout_success');
		} else {
			return View::forge('passwdchange/logout_failure');
		}
	}

	public function action_form() {
		return View::forge('passwdchange/form');
	}

	public function action_submit() {
		if(!Auth::check()) {
			Log::debug("Auth::check() failure.");
			return View::forge('passwdchange/change_failure');
		}

		$username = Session::get('username');
		$password = Input::post('password');
		$auth = Auth::instance();
		$password = $auth->hash_password($password);
		$result = User::update_passwd($username, $password);

		if($result) {
			return View::forge('passwdchange/change_success');
		} else {
			Log::debug("User::update_passwd() failure.");
			return View::forge('passwdchange/change_failure');
		}
	}
}