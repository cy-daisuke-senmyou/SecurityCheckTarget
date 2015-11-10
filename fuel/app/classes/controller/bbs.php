<?php
use \Model\Bbs;

class Controller_Bbs extends Controller
{
	public function action_index() {
		$data['all_post'] = Bbs::get_all_post();

$tmp = print_r($data,true);
Log::debug("data = $tmp");
/*
		rsort($data['all_post']);

$tmp = print_r($data,true);
Log::debug("data = $tmp");
*/
		$view = View::forge('bbs/index');
		$view->set('all_post', $data['all_post'], false);
		return $view;
	}

	public function action_submit() {
		$name = Input::post('name');
		$message = Input::post('message');
		$result = Bbs::post($name, $message);

		if($result) {
			return Response::redirect('bbs/index');;
		} else {
			return View::forge('bbs/failure');
		}
	}
}