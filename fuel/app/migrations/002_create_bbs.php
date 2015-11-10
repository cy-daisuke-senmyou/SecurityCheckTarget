<?php

namespace Fuel\Migrations;

class Create_bbs {

	public function up()
	{
		\DBUtil::create_table('bbs', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 50, 'type' => 'varchar'),
			'message' => array('constraint', 'type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));

		\DB::insert('bbs')->set(array(
			'name' => '名無し',
			'message' => 'これはテストです。',
			'created_at' => time(),
			'updated_at' => time(),
		))->execute();

	}

	public function down()
	{
		\DBUtil::drop_table('bbs');
	}
}