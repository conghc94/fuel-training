<?php

class Controller_User extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'User &raquo; Index';
		$this->template->content = View::forge('user/index', $data);
	}

}
