<?php

class Controller_Fileview extends Controller
{
	public function action_index() {
		return View::forge('fileview/form');
	}

	public function action_submit() {
		$filename = Input::post('filename');
		$path = '/home/ec2-user/public/file/' . $filename;
		$command = "cat $path";
		$data['file'] = shell_exec($command);

		if(!empty($data['file'])) {
			return View::forge('fileview/result', $data);
		} else {
			return View::forge('fileview/failure');
		}
	}
}