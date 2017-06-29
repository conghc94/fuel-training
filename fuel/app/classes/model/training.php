<?php

class Model_Training extends \Orm\Model
{
	protected static $_properties = array(
		
		'id',
		'user_id',
		'subject_id',
		'date',
		'time_start',
		'time_end',
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

	protected static $_table_name = 'trainings';

}
