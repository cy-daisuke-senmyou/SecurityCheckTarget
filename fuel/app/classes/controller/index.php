<?php
use \Model\User;

class Controller_Index extends Controller {
	public function action_index() {
		return View::forge('index');
	}
}