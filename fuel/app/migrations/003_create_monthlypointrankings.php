<?php

namespace Fuel\Migrations;

class Create_monthlypointrankings
{
	public function up()
	{
		\DBUtil::create_table('monthly_point_rankings', array(
			'id' => array('constraint' => 11, 'type' => 'int'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'point' => array('type' => 'float'),
			'year' => array('constraint' => 11, 'type' => 'int'),
			'month' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));

		\DBUtil::add_foreign_key('monthly_point_rankings', array(
                'constraint' => 'monthly_point_rankings_fk_users',
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
		\DBUtil::drop_table('monthly_point_rankings');
	}
}