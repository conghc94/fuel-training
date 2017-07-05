<?php

namespace Fuel\Migrations;

class Create_add_foreignkey_user_marks_to_subjects
{
	public function up()
	{
            \DBUtil::add_foreign_key('user_marks', array(
                'constraint' => 'user_marks_fk_subjects',
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
                \DBUtil::drop_foreign_key('user_marks', 'user_marks_fk_subjects');
	}
}