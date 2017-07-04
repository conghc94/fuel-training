<?php

namespace Fuel\Migrations;

class Create_add_foreignkey_trainings_to_users {

    public function up() {
        \DBUtil::add_foreign_key('trainings', array(
            'constraint' => 'trainings_fk_users',
            'key' => 'user_id',
            'reference' => array(
                'table' => 'users',
                'column' => 'id',
            ),
            'on_update' => 'CASCADE',
            'on_delete' => 'RESTRICT'
        ));
    }

    public function down() {
        \DBUtil::drop_foreign_key('trainings', 'trainings_fk_users');
    }

}
