<?php
use \Model\User;

class Controller_Login extends Controller
{
	public function action_index() {
		return View::forge('login/form');
	}

	public function action_submit() {
		$userid = Input::post('userid');
		$password = Input::post('password');
		//$password = $_POST['password'];

		// ORM
		// $result = User::find('first', array(
		//     'where' => array(
		//         array('id', $userid),
		// 		array('password', $password)
		//     ),
		// ));
		
		// 独自認証方式
		$result = User::check_login($userid, $password);

		if($result) {
			return View::forge('login/success');
		} else {
			return View::forge('login/failure');
		}
	}
}