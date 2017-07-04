<?php

namespace admin;

class Controller_Index extends Controller_Base {

    public function before() {
        parent::before();

        $this->template->header = "";
        $this->template->title = "メンバー管理システム";
        //$this->template->pagetitle = \Constants::$page_title['login'];
    }

    public function action_login() {

        // Already logged in
        \Auth::check() and \Response::redirect('admin/index');

        $val = \Validation::forge();

        if (\Input::method() == 'POST') {

            $val->add('email', 'Email or Username')
                    ->add_rule('required');
            $val->add('password', 'Password')
                    ->add_rule('required');

            if ($val->run()) {
                if (!\Auth::check()) {
                    if (\Auth::login(\Input::post('email'), \Input::post('password'))) {
                        // assign the user id that lasted updated this record
                        foreach (\Auth::verified() as $driver) {
                            if (($id = $driver->get_user_id()) !== false) {
                                // credentials ok, go right in
                                $current_user = \Model\Auth_User::find($id[1]);
                                \Session::set_flash('success', e('Welcome, ' . $current_user->username));
                                \Response::redirect('admin/index');
                            }
                        }
                    } else {
                        $this->template->set_global('login_error', 'Login failed!');
                    }
                } else {
                    $this->template->set_global('login_error', 'Already logged in!');
                }
            }
        }

        $this->template->title = 'Login';
        $this->template->content = \View::forge('admin/login', array('val' => $val), false);
    }

    /**
     * The logout action.
     *
     * @access  public
     * @return  void
     */
    public function action_logout() { //ログアウトする
        \Response::redirect('admin/index/login');
    }

    /**
     * The index action.
     *
     * @access  public
     * @return  void
     */
    public function action_index() { // すでに管理者ユーザーでログインしているなら、メイン画面へ、そうでないならログイン画面へ
        $admin_group_id = \Constants::$user_group['Administrators'];
        if (\Auth::check() && \Auth::member($admin_group_id)) {
            $this->template->title = 'Dashboard';
            $this->template->content = \View::forge('admin/dashboard.php');
        } else {
            \Response::redirect('admin/index/login');
        }
    }

}

/* End of file index.php */
