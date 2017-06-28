<?php

class Controller_Admin_Rank extends Controller_Ranking
{
	function action_dashboard() {
		$data['pages'] = Model_Page::find('all');
		$this->template->title = "Dashboard";
		$this->template->content = View::forge('admin/pages/index', $data);
	}
}