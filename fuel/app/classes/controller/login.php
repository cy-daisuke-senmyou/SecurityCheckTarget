<?php
use \Model\User;

class Controller_Login extends Controller
{
	public function action_index() {
		//$data['user'] = User::get_results();
		//return Response::forge(View::forge('hello',$data));
		return View::forge('login/form');
	}

	public function action_submit() {
		$userid = Input::post('id');
		$password = Input::post('password');
Log::debug("userid = " . $userid);

		$result = User::check_login($userid, $password);
Log::debug("result = " . $result);

		if($result) {
			return View::forge('login/success');
		} else {
			return View::forge('login/failure');
		}
	}
}