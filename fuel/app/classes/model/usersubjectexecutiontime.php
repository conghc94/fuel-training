<?php

class Model_Usersubjectexecutiontime extends \Orm\Model {

    protected static $_table_name = 'user_subject_execution_times';

    protected static $_properties = array(
        'id',
        'user_id',
        'subject_id',
        'execution_time',
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
    
    public static function validate($factory)
    {
            $val = Validation::forge($factory);
            $val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');
            $val->add_field('subject_id', 'Subject Id', 'required|valid_string[numeric]');
            $val->add_field('execution_time', 'required');
            return $val;
    }
    
    protected static $_belongs_to = array(
	    'users' => array(
	        'key_from' => 'user_id',
	        'model_to' => 'Model_User',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    ),
	    'subjects' => array(
	        'key_from' => 'subject_id',
	        'model_to' => 'Model_Subject',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    ),
	);
}
