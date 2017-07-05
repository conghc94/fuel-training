<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'group',
		'email',
		'name',
		'avatar',
		'last_login',
		'login_hash',
		'profile_fields',
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

	protected static $_has_many = array(
		'user_subject_execution_times' => array(
		    'model_to' => 'Model_Usersubjectexecutiontime',
		    'key_from' => 'id',
		    'key_to' => 'user_id',
		    'cascade_save' => true,
		    'cascade_delete' => false,
		),
		'user_marks' => array(
			'model_to' => 'Model_Usermark',
		    'key_from' => 'id',
		    'key_to' => 'user_id',
		    'cascade_save' => true,
		    'cascade_delete' => false,
		),
		'trainings' => array(
			'model_to' => 'Model_Training',
		    'key_from' => 'id',
		    'key_to' => 'user_id',
		    'cascade_save' => true,
		    'cascade_delete' => false,
		),
	);

	protected static $_has_one = array(
	    'monthly_point_rankings' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_Monthlypointranking',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

	protected static $_table_name = 'users';
        
    public static function validate($factory , $param = array())
	{
		$val = Validation::forge($factory);
		switch ($factory) {
			case 'MasterLogin': // 管理者ユーザーログイン
				// validateルール設定
				$val->add_field('username', 'ログインID', 'required');
				$val->add_field('password', 'パスワード', 'required');
				break;
			case 'MasterCreate': // 管理者ユーザー作成
				// validateルール設定
				$val->add_field('username', 'ログインID', 'required|max_length[50]');
				$val->add_field('password', 'パスワード', 'required|max_length[255]');
				$val->add_field('email', 'メールアドレス', 'required|valid_email|max_length[255]');
				break;
			case 'MasterModify': // 管理者ユーザー変更
				// 拡張バリデーションクラスを呼び出し
				$val->add_callable('Validate_user');
				// validateルール設定
				$val->add('old_password', '旧パスワード')
						->add_rule('required_with', 'password')
						->add_rule('oldpasscheck', $param['username'])
						->add_rule('max_length',255);
				$val->add('password', 'パスワード')
						->add_rule('required_with', 'old_password')
						->add_rule('valid_string',array('alpha','numeric'))
						->add_rule('match_value', \Input::post('password2'), true)
						->add_rule('max_length',255);
				$val->add('email', 'メールアドレス')
						->add_rule('match_value', \Input::post('email2'), true)
						->add_rule('valid_email')
						->add_rule('max_length',255);
				$val->set_message('oldpasscheck', \Constants::$error_message['bad_old_password']);
				break;
			case 'UserLogin': // ユーザーログイン
				// validateルール設定
				$val->add_field('username', 'ログインID', 'required');
				$val->add_field('password', 'パスワード', 'required');
				break;

			case 'UserModifyMail': // メール変更
				// validateルール設定
				$val->add('email', 'メールアドレス')
					->add_rule('match_value', \Input::post('email2'), true)
					->add_rule('valid_email')
					->add_rule('max_length',255);
				break;

			case 'UserModifyPass': // 管理者ユーザー変更
				// 拡張バリデーションクラスを呼び出し
				$val->add_callable('Validate_user');
				// validateルール設定
				$val->add('old_password', '旧パスワード')
					->add_rule('required_with', 'password')
					->add_rule('oldpasscheck', $param['username'])
					->add_rule('max_length',255);
				$val->add('password', 'パスワード')
					->add_rule('required_with', 'old_password')
					->add_rule('valid_string',array('alpha','numeric'))
					->add_rule('match_value', \Input::post('password2'), true)
					->add_rule('max_length',255);
				$val->set_message('oldpasscheck', \Constants::$error_message['bad_old_password']);
				break;

			default:
				break;
		}

		return $val;
	}

	public static function getUserRankList() {
		$entry = Model_User::query()->select('name', 'avatar', 't1.point')->related('monthly_point_rankings')->order_by('monthly_point_rankings.point', 'desc')->get();
		// echo '<pre>';
		// print_r($entry);exit;
		return $entry;
	}
}
