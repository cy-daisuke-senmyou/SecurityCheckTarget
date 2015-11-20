<?php

namespace Fuel\Migrations;

class Create_user {

	public function up()
	{
/*		\DBUtil::create_table('user', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'userid' => array('constraint' => 50, 'type' => 'varchar'),
			'email' => array('constraint' => 50, 'type' => 'varchar'),
			'password' => array('constraint' => 125, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
*/
		\DBUtil::create_table('users', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'username' => array('constraint' => 50, 'type' => 'varchar', 'unique' => true),
			'password' => array('constraint' => 255, 'type' => 'varchar'),
			'group' => array('constraint' => 11, 'type' => 'int', 'default' => 1),
			'email' => array('constraint' => 255, 'type' => 'varchar', 'unique' => true),
			'last_login' => array('constraint' => 25, 'type' => 'varchar'),
			'login_hash' => array('constraint' => 255, 'type' => 'varchar'),
			'profile_fields' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));

		// Authパッケージ認証用ユーザー
		\DB::insert('users')->set(array(
			'username' => 'daisuke_senmyou',
			'password' => 'iRaqtv15Xv0sPoDFYUoimjdZOkReEu1f1T+IQ6Wbtgo=',
			'created_at' => time(),
			'updated_at' => time(),
		))->execute();

		// 独自認証用ユーザー
		\DB::insert('users')->set(array(
			'username' => 'plain_text_user',
			'password' => 'password',
			'created_at' => time(),
			'updated_at' => time(),
		))->execute();
	}

	public function down()
	{
		//\DBUtil::drop_table('user');
		\DBUtil::drop_table('users');
	}
}