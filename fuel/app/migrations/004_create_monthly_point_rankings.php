<?php

namespace Fuel\Migrations;

class Create_monthly_point_rankings
{
    public function up()
    {
        \DBUtil::create_table('monthly_point_rankings', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
            'user_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
            'point' => array('type' => 'float'),
            'year' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
            'month' => array('constraint' => 11, 'type' => 'int', 'null' => true),
            'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
            'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
            ), array('id'), false, 'InnoDB', 'utf8_unicode_ci',
                array(
                    'constraint' => 'monthly_point_rankings_fk_users',
                    'key' => 'user_id',
                    'reference' => array(
                        'table' => 'users',
                        'column' => 'id',
                    ),
                    'on_update' => 'CASCADE',
                    'on_delete' => 'RESTRICT'
                )
            );
    }

    public function down()
    {
        \DBUtil::drop_table('monthly_point_rankings');
    }
}