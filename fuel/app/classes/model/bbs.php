<?php
//namespace Model;
use Log;

class Bbs extends \Model {
	public static function get_all_post() {
		$results = \DB::query('select name, message, created_at from bbs order by created_at desc')->execute();
		return $results->as_array();
	}

	public static function post($name, $message) {
		if(empty($name) || empty($message)) {
			return false;

		}
		$sql = "insert into bbs (name, message, created_at, updated_at) values('$name', '$message', unix_timestamp(), unix_timestamp())";

		$result = \DB::query($sql)->execute();
		return $result;
	}
}
