<?php
namespace admin;


class Controller_Rank extends Controller_Base
{
	public $template = 'sidebar_template';

	public function action_index() {
		$data['users'] = \Model_User::getUserRankList();
		$data['total_user'] = \Model_User::count();
		$rank = 0;
		foreach ($data['users'] as $key => $value) {
			$rank++;
			if($value->id == \Auth::get('id')) {
				$data['rank'] = $rank;
			}
		}

		//echo $data['rank'];exit;

        $admin_group_id = \Constants::$user_group['Administrators'];
        if (\Auth::check() && \Auth::member($admin_group_id)) {
            $this->template->title = 'List Point Ranking';
            $this->template->content = \View::forge('rank/index.php', $data);
        } else {
            \Response::redirect('admin/index/login');
        }
    }

}

/* End of file admin.php */
