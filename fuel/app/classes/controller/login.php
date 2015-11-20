<?php
use \Model\User;

class Controller_Login extends Controller
{
	public function action_index() {
		return View::forge('login/form');
	}

	public function action_submit() {
		$username = Input::post('username');
		//$password = Input::post('password');
		$password = $_POST['password'];

		$result = User::check_login($username, $password);

		if($result) {
			return View::forge('login/success');
		} else {
			return View::forge('login/failure');
		}
	}
}