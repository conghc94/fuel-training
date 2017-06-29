<?php

namespace Fuel\Migrations;

class Create_trainings
{
	public function up()
	{
            \DBUtil::create_table('trainings', array(
                'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
                'user_id' => array('constraint' => 11, 'type' => 'int'),
                'subject_id' => array('constraint' => 11, 'type' => 'int'),
                'time' => array('type' => 'timestamp'),

            ), array('id')
            );
	}

	public function down()
	{
		\DBUtil::drop_table('training');
	}
}