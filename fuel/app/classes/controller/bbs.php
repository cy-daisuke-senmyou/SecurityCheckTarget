<?php
use \Model\Bbs;

class Controller_Bbs extends Controller
{
	public function action_index() {
		$data['all_post'] = $this->get_all_post();
		$view = View::forge('bbs/index');
		$view->set('all_post', $data['all_post'], false);
		return $view;
	}

	public function action_submit() {
		$name = Input::post('name');
		//$message = Input::post('message');
		$message = $_POST['message'];
		$result = $this->post($name, $message);

		if($result) {
			return Response::redirect('bbs/index');;
		} else {
			return View::forge('bbs/failure');
		}
	}

	private function get_all_post() {
Log::debug("private get_all_post().");
		$results = \DB::query('select name, message, created_at from bbs order by created_at desc')->execute();
		return $results->as_array();
	}

	private function post($name, $message) {
Log::debug("private post().");
		if(empty($name) || empty($message)) {
			return false;

		}
		$sql = "insert into bbs (name, message, created_at, updated_at) values('$name', '$message', unix_timestamp(), unix_timestamp())";

		$result = \DB::query($sql)->execute();
		return $result;
	}

}