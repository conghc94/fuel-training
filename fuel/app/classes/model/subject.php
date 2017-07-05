<?php

class Model_Subject extends \Orm\Model
{
	protected static $_properties = array(
		
		'id',
		'name',
		'created_at',
		'updated_at',
	);

	//protected static $has_many = array('user_subject_execution_times', 'user_marks', 'trainings');

	protected static $_has_many = array(
		'user_subject_execution_times' => array(
		    'model_to' => 'Model_Usersubjectexecutiontime',
		    'key_from' => 'id',
		    'key_to' => 'subject_id',
		    'cascade_save' => true,
		    'cascade_delete' => false,
		),
		'user_marks' => array(
			'model_to' => 'Model_Usermark',
		    'key_from' => 'id',
		    'key_to' => 'subject_id',
		    'cascade_save' => true,
		    'cascade_delete' => false,
		),
		'trainings' => array(
			'model_to' => 'Model_Training',
		    'key_from' => 'id',
		    'key_to' => 'subject_id',
		    'cascade_save' => true,
		    'cascade_delete' => false,
		),
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

	protected static $_table_name = 'subjects';

}
