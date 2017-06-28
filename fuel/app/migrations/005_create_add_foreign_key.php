<?php

namespace Fuel\Migrations;

class Create_add_foreign_key
{
	public function up()
	{    
            \DBUtil::add_foreign_key('monthly_point_rankings', array(
                'constraint' => 'fk_1',
                'key' => 'id',
                'reference' => array(
                    'table' => 'users',
                    'column' => 'user_id',
                ),
                'on_update' => 'CASCADE',
                'on_delete' => 'RESTRICT'
            ));
	}

	public function down()
	{
            \DBUtil::drop_foreign_key('monthly_point_rankings', 'user_id');
	}
}