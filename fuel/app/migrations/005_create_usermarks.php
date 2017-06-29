<?php

namespace Fuel\Migrations;

class Create_usermarks
{
	public function up()
	{
		\DBUtil::create_table('user_marks', array(
			'id' => array('constraint' => 11, 'type' => 'int'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'subject_id' => array('constraint' => 11, 'type' => 'int'),
			'mark' => array('constraint' => 11, 'type' => 'float'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));

		\DBUtil::add_foreign_key('user_marks', array(
		    'constraint' => 'fk_user_mark',
		    'key' => 'user_id',
		    'reference' => array(
		        'table' => 'users',
		        'column' => 'id',
		    ),
		    'on_update' => 'CASCADE',
		    'on_delete' => 'RESTRICT'
		));

		\DBUtil::add_foreign_key('user_marks', array(
		    'constraint' => 'fk_mark_subject',
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
		\DBUtil::drop_table('user_marks');
	}
}