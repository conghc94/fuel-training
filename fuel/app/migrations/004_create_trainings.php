<?php

namespace Fuel\Migrations;

class Create_trainings
{
	public function up()
	{
		\DBUtil::create_table('trainings', array(
			'id' => array('constraint' => 11, 'type' => 'int'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'subject_id' => array('constraint' => 11, 'type' => 'int'),
			'date' => array('type' => 'date'),
			'time_start' => array('type' => 'time'),
			'time_end' => array('type' => 'time'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));

		\DBUtil::add_foreign_key('trainings', array(
		    'constraint' => 'fk_user_training',
		    'key' => 'user_id',
		    'reference' => array(
		        'table' => 'users',
		        'column' => 'id',
		    ),
		    'on_update' => 'CASCADE',
		    'on_delete' => 'RESTRICT'
		));

		\DBUtil::add_foreign_key('trainings', array(
		    'constraint' => 'fk_user_subject',
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
		\DBUtil::drop_table('trainings');
	}
}