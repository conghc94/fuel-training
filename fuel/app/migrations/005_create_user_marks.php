<?php

namespace Fuel\Migrations;

class Create_user_marks
{
	public function up()
	{
            \DBUtil::create_table('user_marks', array(
                'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
                'user_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
                'subject_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
                'mark' => array('type' => 'float'),
                'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
                'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
		),array('id')
            );

            \DBUtil::add_foreign_key('user_marks', array(
                'constraint' => 'user_marks_fk_users',
                'key' => 'user_id',
                'reference' => array(
                    'table' => 'users',
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