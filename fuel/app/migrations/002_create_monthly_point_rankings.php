<?php

namespace Fuel\Migrations;

class Create_monthly_point_rankings
{
	public function up()
	{
		\DBUtil::create_table(
			'monthly_point_rankings', array(
				'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
				'user_id' => array('constraint' => 11, 'type' => 'int'),
				'point' => array('type' => 'float'),
				'year' => array('constraint' => 11, 'type' => 'int'),
				'month' => array('constraint' => 11, 'type' => 'int'),
				'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
				'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

			), array('id'),
			array(
		        array(
		            'constraint' => 'constraintA',
		            'key' => 'user_id',
		            'reference' => array(
		                'table' => 'users',
		                'column' => 'id',
		            ),
		            'on_update' => 'CASCADE',
		            'on_delete' => 'RESTRICT'
		        )
		    )
		);
	}

	public function down()
	{
		\DBUtil::drop_table('monthly_point_rankings');
	}
}