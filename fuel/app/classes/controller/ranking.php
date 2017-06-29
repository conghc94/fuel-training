<?php

class Controller_Ranking extends Controller_Base
{
	public $template = 'ranking/template';

	// public function before()
	// {
	// 	parent::before();

	// 	$this->current_user = null;

	// 	foreach (\Auth::verified() as $driver)
	// 	{
	// 		if (($id = $driver->get_user_id()) !== false)
	// 		{
	// 			$this->current_user = Model\Auth_User::find($id[1]);
	// 		}
	// 		break;
	// 	}

	// 	// Set a global variable so views can use it
	// 	View::set_global('current_user', $this->current_user);
	// }

	public function before()
	{
		parent::before();

		if (Request::active()->controller !== 'Controller_Admin' or ! in_array(Request::active()->action, array('login', 'logout')))
		{
			if (Auth::check())
			{
				$admin_group_id = Config::get('auth.driver', 'Simpleauth') == 'Ormauth' ? 6 : 100;
				if ( ! Auth::member($admin_group_id))
				{
					Session::set_flash('error', e('You don\'t have access to the admin panel'));
					Response::redirect('/');
				}
			}
			else
			{
				Response::redirect('admin/login');
			}
		}
	}

}
