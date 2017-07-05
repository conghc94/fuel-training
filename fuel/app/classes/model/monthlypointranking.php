<?php

class Model_Monthlypointranking extends \Orm\Model {

    protected static $_table_name = 'monthly_point_rankings';

    protected static $_properties = array(
        'id',
        'point',
        'year',
        'month',
        'created_at',
        'updated_at',
    );
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_update'),
            'mysql_timestamp' => false,
        ),
    );

    public static function validate($factory) {
        $val = Validation::forge($factory);
        $val->add_field('id', 'User Id', 'required|valid_string[numeric]');
        $val->add_field('name', 'required|max_length[255]');
        $val->add_field('point', 'required');
        $val->add_field('year', 'required|valid_string[numeric]');
        $val->add_field('month', 'required|valid_string[numeric]');
        return $val;
    }
    
    /*relation one one users*/
    protected static $_belongs_to = array(
        'users' => array(
            'key_from' => 'id',
            'model_to' => 'Model_User',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );

}
