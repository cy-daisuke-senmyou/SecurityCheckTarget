<?php
namespace Model;
use Log;

class User extends \Model {
	public static function get_results() {
        $results = \DB::query('SELECT * FROM user')->execute();
        return $results->as_array();
    }

	public static function check_login($userid, $password) {
		$result = \DB::query("SELECT * FROM user where userid = '$userid' and password = '$password'")->execute();
		$result_array = $result->as_array();
		if(count($result_array) === 1 && is_numeric($result_array[0]['id'])) {
			return true;
		} else {
			return false;
		}
	}

}
