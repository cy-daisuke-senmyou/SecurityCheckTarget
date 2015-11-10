<?php
use \Model\User;

class Controller_Login extends Controller
{
	public function action_index() {
		return View::forge('login/form');
	}

	public function action_submit() {
		$userid = Input::post('id');
		$password = Input::post('password');

		$result = User::check_login($userid, $password);

		if($result) {
			return View::forge('login/success');
		} else {
			return View::forge('login/failure');
		}
	}
}