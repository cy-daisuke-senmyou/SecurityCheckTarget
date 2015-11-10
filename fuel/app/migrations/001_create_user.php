<?php

namespace Fuel\Migrations;

class Create_user {

	public function up()
	{
		\DBUtil::create_table('user', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'userid' => array('constraint' => 50, 'type' => 'varchar'),
			'email' => array('constraint' => 50, 'type' => 'varchar'),
			'password' => array('constraint' => 125, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));

		\DB::insert('user')->set(array(
			'userid' => 'daisuke_senmyou',
			'password' => 'password',
			'created_at' => time(),
			'updated_at' => time(),
		))->execute();

	}

	public function down()
	{
		\DBUtil::drop_table('user');
	}
}