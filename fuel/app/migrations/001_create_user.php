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
			'email' => array('constraint' => 255, 'type' => 'varchar', 'null' => true, 'unique' => true),
			'last_login' => array('constraint' => 25, 'type' => 'varchar', 'null' => true),
			'login_hash' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));

		\DB::insert('users')->set(array(
			'username' => 'daisuke_senmyou',
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