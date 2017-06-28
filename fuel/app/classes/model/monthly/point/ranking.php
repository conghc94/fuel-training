<?php

class Model_Monthly_Point_Ranking extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'login_id',
		'first_name',
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

	protected static $_table_name = 'monthly_point_rankings';

}
