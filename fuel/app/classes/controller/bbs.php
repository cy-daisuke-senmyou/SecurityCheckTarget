<?php
use \Model\Bbs;

class Controller_Bbs extends Controller
{
	public function action_index() {
		//$bbs = new Bbs();
		//$data['all_post'] = $bbs->get_all_post();
		$data['all_post'] = Bbs::get_all_post();
		$view = View::forge('bbs/index');
		$view->set('all_post', $data['all_post'], false);
		return $view;
	}

	public function action_submit() {
		$name = Input::post('name');
		$message = Input::post('message');
		//$message = $_POST['message'];
		//$bbs = new Bbs();
		//$result = $bbs->post($name, $message);
		$result = Bbs::post($name, $message);

		if($result) {
			return Response::redirect('bbs/index');;
		} else {
			return View::forge('bbs/failure');
		}
	}
}