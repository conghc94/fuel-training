<?php

namespace Fuel\Migrations;

class Create_userexecutiontimes
{
	public function up()
	{
		\DBUtil::create_table('user_execution_times', array(
			'id' => array('constraint' => 11, 'type' => 'int'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'subject_id' => array('constraint' => 11, 'type' => 'int'),
			'execution_time' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));

		\DBUtil::add_foreign_key('user_execution_times', array(
		    'constraint' => 'fk_user_execution_time',
		    'key' => 'user_id',
		    'reference' => array(
		        'table' => 'users',
		        'column' => 'id',
		    ),
		    'on_update' => 'CASCADE',
		    'on_delete' => 'RESTRICT'
		));

		\DBUtil::add_foreign_key('user_execution_times', array(
		    'constraint' => 'fk_subject_execution_time',
		    'key' => 'subject_id',
		    'reference' => array(
		        'table' => 'subjects',
		        'column' => 'id',
		    ),
		    'on_update' => 'CASCADE',
		    'on_delete' => 'RESTRICT'
		));
	}

	public function down()
	{
		\DBUtil::drop_table('user_execution_times');
	}
}