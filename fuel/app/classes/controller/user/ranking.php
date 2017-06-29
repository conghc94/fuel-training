<?php
class Controller_User_Ranking extends Controller_Ranking
{

	public function action_index()
	{
		$this->template->title = "Posts";
		$this->template->content = View::forge('user/ranking/index');
	}

}
