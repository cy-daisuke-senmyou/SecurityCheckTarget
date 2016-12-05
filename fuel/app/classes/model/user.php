<?php
namespace Model;
use Log;

class User extends \Orm\Model {
	public static function check_login($userid, $password) {
		
		// Fuelphp DB::escape() でのエスケープ
		// $userid = \DB::escape($userid);
		// $password = \DB::escape($password);
		// $query = "SELECT * FROM `users` where `id` = $userid and `password` = $password";
		// $result = \DB::query($query)->execute();
		// $result_array = $result->as_array();
		
		// QueryBuilderでのクエリー組み立て→適切にエスケープされる
		// $result = \DB::select()->from('users')->where('id', $userid)->where('password', $password)->execute();
		// $result_array = $result->as_array();

		// PDO
		// $pdo = new \PDO('mysql:host=localhost; dbname=SEC_CHECK; charset=utf8', 'user','password');
		// $userid = $pdo->quote($userid, \PDO::PARAM_INT);
		// $password = $pdo->quote($password);
		// $query = "SELECT * FROM `users` where `id` = $userid and `password` = $password";
		// $result_array = $pdo->query($query)->fetchAll();
		// print_r($result_array);


		$mysqli = new \mysqli('localhost', 'user', 'password', 'SEC_CHECK');
		if ($mysqli->connect_error) {
		    print($mysqli->connect_error);
		    exit();
		}
		$mysqli->set_charset("utf8");
		
		$stmt = $mysqli->prepare("SELECT * FROM `users` where `id` = ? and `password` = ?");
		$stmt->bind_param('is', $userid, $password);
		$stmt->execute();
			
		// mysqli
		// $mysqli = new \mysqli('localhost', 'user', 'password', 'SEC_CHECK');
		// if ($mysqli->connect_error) {
		//     print($mysqli->connect_error);
		//     exit();
		// }
		// $mysqli->set_charset("utf8");
		// 
		// $userid = $mysqli->real_escape_string($userid);
		// print($userid);
		// $password = $mysqli->real_escape_string($password);
		// $query = "SELECT * FROM `users` where `id` = $userid and `password` = '$password'";
		// $result = $mysqli->query($query);
		// $result_array = $result->fetch_array();
		
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
