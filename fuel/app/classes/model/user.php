<?php
namespace Model;
use Log;

class User extends \Model {
	public static function check_login($username, $password) {
		$result = \DB::query("SELECT * FROM users where username = '$username' and password = '$password'")->execute();
		$result_array = $result->as_array();
		if(count($result_array) >= 1 && is_numeric($result_array[0]['id'])) {
			return true;
		} else {
			return false;
		}
	}

	public static function update_passwd($username, $password) {
		$result = \DB::query("update users set password = '$password' where username = '$username'")->execute();
		// パスワードが変更された場合の戻り値は「1」だが、同じ値だと戻り値は「0」になる。
		if($result >= 0) {
			return true;
		} else {
			return false;
		}
	}
}
