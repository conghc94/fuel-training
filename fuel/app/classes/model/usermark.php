<?php

class Model_Usermark extends \Orm\Model
{
	protected static $_properties = array(
		
		'id',
		'user_id',
		'subject_id',
		'mark',
		'created_at',
		'updated_at',
	);

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

	protected static $_table_name = 'user_marks';

}
