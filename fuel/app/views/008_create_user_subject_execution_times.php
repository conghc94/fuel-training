<?php

namespace Fuel\Migrations;

class Create_user_subject_execution_times
{
	public function up()
	{
		\DBUtil::create_table('user_subject_execution_times', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'user_id' => array('constraint' => 11, 'type' => 'int','unsigned' => true),
			'subject_id' => array('constraint' => 11, 'type' => 'int','unsigned' => true),
			'execution_time' => array('type' => 'float'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('user_subject_execution_times');
	}
}