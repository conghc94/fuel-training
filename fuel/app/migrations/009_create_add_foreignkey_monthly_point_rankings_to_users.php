<?php

namespace Fuel\Migrations;

class Create_add_foreignkey_monthly_point_rankings_to_users
{
	public function up()
	{
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
            \DBUtil::drop_foreign_key('monthly_point_rankings','monthly_point_rankings_fk_users');
	}
}